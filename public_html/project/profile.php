<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
//handle public profile
$user_id = (int)se($_GET, "id", get_user_id(), false);
$isMe = $user_id == get_user_id();
$isEdit = isset($_GET["edit"]);

$db = getDB();
?>
<?php
if (isset($_POST["save"]) && $isMe && $isEdit) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
    $vis = isset($_POST["vis"]) ? 1 : 0;
    $params = [":email" => $email, ":username" => $username, ":id" => get_user_id(), ":vis" => $vis];

    $stmt = $db->prepare("UPDATE Users set email = :email, username = :username, is_visible = :vis where id = :id");
    try {
        $stmt->execute($params);
        flash("Profile saved", "success");
    } catch (Exception $e) {
        if ($e->errorInfo[1] === 1062) {
            //https://www.php.net/manual/en/function.preg-match.php
            preg_match("/Users.(\w+)/", $e->errorInfo[2], $matches);
            if (isset($matches[1])) {
                flash("The chosen " . $matches[1] . " is not available.", "warning");
            } else {
                //TODO come up with a nice error message
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        } else {
            //TODO come up with a nice error message
            echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
        }
    }



    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        if ($new_password === $confirm_password) {
            //TODO validate current
            $stmt = $db->prepare("SELECT password from Users where id = :id");
            try {
                $stmt->execute([":id" => get_user_id()]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (isset($result["password"])) {
                    if (password_verify($current_password, $result["password"])) {
                        $query = "UPDATE Users set password = :password where id = :id";
                        $stmt = $db->prepare($query);
                        $stmt->execute([
                            ":id" => get_user_id(),
                            ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                        ]);

                        flash("Password reset", "success");
                    } else {
                        flash("Current password is invalid", "warning");
                    }
                }
            } catch (Exception $e) {
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        } else {
            flash("New passwords don't match", "warning");
        }
    }
}
//select fresh data from table
$stmt = $db->prepare("SELECT id, email, username,is_visible, created from Users where id = :id LIMIT 1");
$isVisible = false;
try {
    $stmt->execute([":id" => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if ($isMe) {
            $_SESSION["user"]["email"] = $user["email"];
            $_SESSION["user"]["username"] = $user["username"];
        }
        if (se($user, "is_visible", 0, false) > 0) {

            $isVisible = true;
        }
        $email = se($user, "email", "", false);
        $username = se($user, "username", "", false);
        $joined = se($user, "created", "", false);
        $userid = se($user, "id", "", false);
    } else {
        flash("User doesn't exist", "danger");
    }
} catch (Exception $e) {
    flash("An unexpected error occurred, please try again", "danger");
    //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
}
if ($isVisible || $isMe) {
    $params = [];
    $results2 = [];

    $params[":uid"] = "$userid";


    $stmt = $db->prepare("SELECT id,product_id,rating from Ratings  WHERE  user_id = :uid");
    foreach ($params as $key => $value) {
        error_log(var_export($value, true));
        $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
        $stmt->bindValue($key, $value, $type);
    }
    $params = null;
    try {
        $stmt->execute($params);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results2 = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash(" product test pull Error fetching records we in it bby", "danger");
    }
}


?>
<div class="container-fluid">
    <h1>Profile</h1>

    <?php if ($isMe && $isEdit) : ?>
        <?php if ($isMe) : ?>
            <a href="<?php echo get_url("profile.php"); ?>">View</a>
        <?php endif; ?>
        <form method="POST" onsubmit="return validate(this);">
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php se($email); ?>" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" value="<?php se($username); ?>" />
            </div>
            <div class="mb-3">
                <div class="form-check form-switch">
                    <input <?php if ($isVisible) {
                                echo "checked";
                            } ?> class="form-check-input" type="checkbox" role="switch" id="vis" name="vis">
                    <label class="form-check-label" for="vis">Toggle Visibility</label>
                </div>
            </div>
            <!-- DO NOT PRELOAD PASSWORD -->
            <div class="mb-3">Password Reset</div>
            <div class="mb-3">
                <label class="form-label" for="cp">Current Password</label>
                <input class="form-control" type="password" name="currentPassword" id="cp" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="np">New Password</label>
                <input class="form-control" type="password" name="newPassword" id="np" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="conp">Confirm Password</label>
                <input class="form-control" type="password" name="confirmPassword" id="conp" />
            </div>
            <input type="submit" class="mt-3 btn btn-primary" value="Update Profile" name="save" />
        </form>
    <?php else : ?>
        <?php if ($isMe) : ?>
            <a href="?edit">Edit</a>
        <?php endif; ?>
        <?php if ($isVisible || $isMe) : ?>

            <?php if (count($results2) == 0) : ?>
                <p>No reviews for this item</p>
            <?php else : ?>
                <div class="col row">
                    <h1>Item Reviews </h1>
                    <?php foreach ($results2 as $item) : ?>
                        <div class="card">
                            <div class="card-header">
                         
                                <a href="<?php echo get_url('item_details.php'); ?>?id=<?php se($item, "product_id"); ?>">Item Details</a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"> Rating ☆<?php se($item, "rating"); ?> /5</h5>
                             
                         
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>



        <?php else : ?>
            Profile is private
            <?php
            flash("Profile is private", "warning");
            redirect("home.php");
            ?>
        <?php endif; ?>
</div>
<?php endif; ?>

<script>
    function validate(form) {
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        let username = form.username.value;
        let email = form.email.value;
        let valid_username = is_valid_username(username);
        let pass_validator = string_compare(pw, con);
        let email_Valid = isValidEmail(email);
        isValid = true;
        //TODO add other client side validation....

        //example of using flash via javascript
        //find the flash container, create a new element, appendChild
        if (!pass_validator) {
            flash("Password and Confrim password must match", "warning");
            isValid = false;
        }

        if (con.length < 8 || pw.length < 8) {

            flash("Client Side- Password is not long enough", "warning");
            isValid = false;
        }

        if (!valid_username) {
            flash("Client Side- Invalid Username", "warning");
            isValid = false;

        }

        if (!email_Valid) {

            flash("Client Side - Invalid email", "warning");
            isValid = false;


        }


        return isValid;
    }
</script>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>