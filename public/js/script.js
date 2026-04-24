// === Login ===
try {
    var loginBtn = document.getElementById("loginBtn");
    loginBtn.addEventListener("click", function (ev) {
        var user_name = document.getElementById("user_name");
        var user_pass = document.getElementById("user_pass");

        var user_name_value = user_name.value.trim();
        var user_pass_value = user_pass.value.trim();

        var errorBox = document.getElementById("loginErrorsBox");

        var errorsList = [];

        if (user_name_value.length <= 0) {
            errorsList.push("Username is required!");
        }else if (user_name_value.length < 6) {
            errorsList.push("Username must be more than 6 characters!");
        }else if (user_name_value.length > 120) {
            errorsList.push("Username must be less than 120 characters!");
        }


        if (user_pass_value.length <= 0) {
            errorsList.push("Password is required!");
        }else if (user_pass_value.length < 6) {
            errorsList.push("Password must be more than 6 characters!");
        }else if (user_pass_value.length > 120) {
            errorsList.push("Password must be less than 120 characters!");
        }


        if (errorsList.length > 0) {
            ev.preventDefault();
            errorBox.innerHTML = errorsList.join("<br>");
            errorBox.style.display = "block";
        }

    });
} catch (error) {
    // DO NOTHING
}



// === Register ===
try {
    var registerBtn = document.getElementById("registerBtn");
    registerBtn.addEventListener("click", function (ev){
        var user_full_name = document.getElementById("user_full_name");
        var user_name = document.getElementById("user_name");
        var user_pass = document.getElementById("user_pass");
        var user_email = document.getElementById("user_email");
        var user_phone = document.getElementById("user_phone");
        var user_address = document.getElementById("user_address");

        var user_full_name_value = user_full_name.value.trim();
        var user_name_value = user_name.value.trim();
        var user_pass_value = user_pass.value.trim();
        var user_email_value = user_email.value.trim();
        var user_phone_value = user_phone.value.trim();
        var user_address_value = user_address.value.trim();

        var errorBox = document.getElementById("registerErrorsBox");

        var errorsList = [];

        if (user_full_name_value.length <= 0) {
            errorsList.push("Full Name is required!");
        }else if (user_full_name_value.length < 6) {
            errorsList.push("Full Name must be more than 6 characters!");
        }else if (user_full_name_value.length > 120) {
            errorsList.push("Full Name must be less than 120 characters!");
        }


        if (user_name_value.length <= 0) {
            errorsList.push("Username is required!");
        }else if (user_name_value.length < 6) {
            errorsList.push("Username must be more than 6 characters!");
        }else if (user_name_value.length > 120) {
            errorsList.push("Username must be less than 120 characters!");
        }


        if (user_pass_value.length <= 0) {
            errorsList.push("Password is required!");
        }else if (user_pass_value.length < 6) {
            errorsList.push("Password must be more than 6 characters!");
        }else if (user_pass_value.length > 120) {
            errorsList.push("Password must be less than 120 characters!");
        }

        if (user_email_value.length <= 0) {
            errorsList.push("Email is required!");
        }else if (user_email_value.length < 6) {
            errorsList.push("Email must be more than 6 characters!");
        }else if (user_email_value.length > 120) {
            errorsList.push("Email must be less than 120 characters!");
        }

        if (user_phone_value.length <= 0) {
            errorsList.push("Phone is required!");
        }else if (user_phone_value.length > 100) {
            errorsList.push("Phone must be less than 100 characters!");
        }


        if (user_address_value.length > 256) {
            errorsList.push("Address must be less than 256 characters!");
        }

        if (errorsList.length > 0) {
            ev.preventDefault();
            errorBox.innerHTML = errorsList.join("<br>");
            errorBox.style.display = "block";
        }
    });
} catch (error) {
    // DO NOTHING
}



// === Products ===
function orderNow(productElemnet) {
    var product_id = productElemnet.value.trim();
    if (confirm("You did an order, Are you sure about that?") == true) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Here is the Response
                var responseMsgBox = document.getElementById("responseMsgBox");
                responseMsgBox.innerHTML = this.responseText;
                responseMsgBox.style.display = "block";
            }
        };

        xhttp.open("POST", "order.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cmd=makeOrder&" + "product_id=" + product_id);
    }
    
}





// === Profile ===
try {
    var updateBtn = document.getElementById("updateBtn");
    updateBtn.addEventListener("click", function (ev) {
        var user_full_name = document.getElementById("user_full_name");
        var user_phone = document.getElementById("user_phone");
        var user_address = document.getElementById("user_address");

        var user_full_name_value = user_full_name.value.trim();
        var user_phone_value = user_phone.value.trim();
        var user_address_value = user_address.value.trim();

        var errorBox = document.getElementById("profileErrorBox");

        var errorsList = [];


        if (user_full_name_value.length <= 0) {
            errorsList.push("Full Name is required!");
        }else if (user_full_name_value.length < 6) {
            errorsList.push("Full Name must be more than 6 characters!");
        }else if (user_full_name_value.length > 120) {
            errorsList.push("Full Name must be less than 120 characters!");
        }


        if (user_phone_value.length <= 0) {
            errorsList.push("Phone is required!");
        }else if (user_phone_value.length > 100) {
            errorsList.push("Phone must be less than 100 characters!");
        }


        if (user_address_value.length > 256) {
            errorsList.push("Address must be less than 256 characters!");
        }

        
        if (errorsList.length > 0) {
            ev.preventDefault();
            errorBox.innerHTML = errorsList.join("<br>");
            errorBox.style.display = "block";
        }
    });
} catch (error) {
    // DO NOTHING
}


function deleteOrder(productElemnet) {
    var order_id = productElemnet.value.trim();
    if (confirm("Are you sure that you wanna delete this order?") == true) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Here is the Response
                var responseMsgBox = document.getElementById("responseMsgBox");
                responseMsgBox.innerHTML = this.responseText;
                responseMsgBox.style.display = "block";
            }
        };

        xhttp.open("POST", "order.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cmd=deleteOrder&" + "order_id=" + order_id);
    }
    
}

// === Reset Password ===
try {
    var resetPassBtn = document.getElementById("resetPassBtn");
    resetPassBtn.addEventListener("click", function (ev) {
        var old_pass = document.getElementById("old_pass");
        var new_pass = document.getElementById("new_pass");
        var reenter_new_pass = document.getElementById("reenter_new_pass");

        var old_pass_value = old_pass.value.trim();
        var new_pass_value = new_pass.value.trim();
        var reenter_new_pass_value = reenter_new_pass.value.trim();

        var errorBox = document.getElementById("resetPasswordErrorBox");

        var errorsList = [];

        if (old_pass_value.length <= 0) {
            errorsList.push("Old Password is required!");
        }else if (old_pass_value.length < 6) {
            errorsList.push("Old Password must be more than 6 characters!");
        }else if (old_pass_value.length > 120) {
            errorsList.push("Old Password must be less than 120 characters!");
        }

        if (new_pass_value.length <= 0) {
            errorsList.push("New Password is required!");
        }else if (new_pass_value.length < 6) {
            errorsList.push("New Password must be more than 6 characters!");
        }else if (new_pass_value.length > 120) {
            errorsList.push("New Password must be less than 120 characters!");
        }

        if (reenter_new_pass_value.length <= 0) {
            errorsList.push("Re-Enter New Password is required!");
        }else if (reenter_new_pass_value.length < 6) {
            errorsList.push("Re-Enter New Password must be more than 6 characters!");
        }else if (reenter_new_pass_value.length > 120) {
            errorsList.push("Re-Enter New Password must be less than 120 characters!");
        }

        if (new_pass_value != reenter_new_pass_value) {
            errorsList.push("New Password Does NOT Match Each Other!");
        }

        if (errorsList.length > 0) {
            ev.preventDefault();
            errorBox.innerHTML = errorsList.join("<br>");
            errorBox.style.display = "block";
        }
    });
} catch (error) {
    // DO NOTHING
}


// === admin/index.php ===
try {
    var adminLoginBtn = document.getElementById("adminLoginBtn");
    adminLoginBtn.addEventListener("click", function (ev) {
        var admin_user = document.getElementById("admin_user");
        var admin_pass = document.getElementById("admin_pass");

        var admin_user_value = admin_user.value.trim();
        var admin_pass_value = admin_pass.value.trim();

        var errorBox = document.getElementById("adminLoginErrorsBox");

        var errorsList = [];

        if (admin_user_value.length <= 0) {
            errorsList.push("Admin Username is required!");
        }else if (admin_user_value.length < 6) {
            errorsList.push("Admin Username must be more than 6 characters!");
        }else if (admin_user_value.length > 120) {
            errorsList.push("Admin Username must be less than 120 characters!");
        }

        if (admin_pass_value.length <= 0) {
            errorsList.push("Admin Password is required!");
        }else if (admin_pass_value.length < 6) {
            errorsList.push("Admin Password must be more than 6 characters!");
        }else if (admin_pass_value.length > 120) {
            errorsList.push("Admin Password must be less than 120 characters!");
        }

        if (errorsList.length > 0) {
            ev.preventDefault();
            errorBox.innerHTML = errorsList.join("<br>");
            errorBox.style.display = "block";
        }
    });
} catch (error) {
    // DO NOTHING
}




// === admin/users.php
function deleteUser(userElemnet) {
    var user_id = userElemnet.value.trim();
    if (confirm("Are you sure that you wanna delete this user?") == true) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Here is the Response
                var responseMsgBox = document.getElementById("responseMsgBox");
                responseMsgBox.innerHTML = this.responseText;
                responseMsgBox.style.display = "block";
            }
        };

        xhttp.open("POST", "usersCommands.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cmd=deleteUser&" + "user_id=" + user_id);
    }
    
}

// === admin/usersCommands.php ===
try {
    var editBtn = document.getElementById("editBtn");
    editBtn.addEventListener("click", function (ev) {
        var user_full_name = document.getElementById("user_full_name");
        var user_name = document.getElementById("user_name");
        var user_pass = document.getElementById("user_pass");
        var user_email = document.getElementById("user_email");
        var user_phone = document.getElementById("user_phone");
        var user_address = document.getElementById("user_address");

        var user_full_name_value = user_full_name.value.trim();
        var user_name_value = user_name.value.trim();
        var user_pass_value = user_pass.value.trim();
        var user_email_value = user_email.value.trim();
        var user_phone_value = user_phone.value.trim();
        var user_address_value = user_address.value.trim();

        var errorBox = document.getElementById("usersCommandsMsgsBox");

        var errorsList = [];

        if (user_full_name_value.length <= 0) {
            errorsList.push("Full Name is required!");
        }else if (user_full_name_value.length < 6) {
            errorsList.push("Full Name must be more than 6 characters!");
        }else if (user_full_name_value.length > 120) {
            errorsList.push("Full Name must be less than 120 characters!");
        }


        if (user_name_value.length <= 0) {
            errorsList.push("Username is required!");
        }else if (user_name_value.length < 6) {
            errorsList.push("Username must be more than 6 characters!");
        }else if (user_name_value.length > 120) {
            errorsList.push("Username must be less than 120 characters!");
        }


        if (user_pass_value.length <= 0) {
            errorsList.push("Password is required!");
        }else if (user_pass_value.length < 6) {
            errorsList.push("Password must be more than 6 characters!");
        }else if (user_pass_value.length > 120) {
            errorsList.push("Password must be less than 120 characters!");
        }

        if (user_email_value.length <= 0) {
            errorsList.push("Email is required!");
        }else if (user_email_value.length < 6) {
            errorsList.push("Email must be more than 6 characters!");
        }else if (user_email_value.length > 120) {
            errorsList.push("Email must be less than 120 characters!");
        }

        if (user_phone_value.length <= 0) {
            errorsList.push("Phone is required!");
        }else if (user_phone_value.length > 100) {
            errorsList.push("Phone must be less than 100 characters!");
        }


        if (user_address_value.length > 256) {
            errorsList.push("Address must be less than 256 characters!");
        }

        if (errorsList.length > 0) {
            ev.preventDefault();
            errorBox.innerHTML = errorsList.join("<br>");
            errorBox.style.display = "block";
        }


    });
} catch (error) {
    // DO NOTHING
}


// === products.php ===
function deleteProduct(productElemnet) {
    var product_id = productElemnet.value.trim();
    if (confirm("Are you sure that you wanna delete this product?") == true) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Here is the Response
                var responseMsgBox = document.getElementById("responseMsgBox");
                responseMsgBox.innerHTML = this.responseText;
                responseMsgBox.style.display = "block";
            }
        };

        xhttp.open("POST", "products.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cmd=deleteProduct&" + "product_id=" + product_id);
    }
    
}