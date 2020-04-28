$(".container-login100-form-btn").click(function(){var email=$("input[name='email']").val();var password=$("input[name='pass']").val();if(email==""){$("#text_error").html("Введіть емейл");return 0}
if(password==""){$("#text_error").html("Введіть пароль");return 0}
console.log(email);console.log(password);var post_query={email:email,password:password}
$.post("/ajax/login.php",post_query,function(post_answer){if(post_answer=="error"){$("#text_error").html("Невірний логін або пароль");return 0}
window.location.href="https://cpp.server-user.info"})})