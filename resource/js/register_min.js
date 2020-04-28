$(".login100-form-btn").click(function(){var name=$("input[name='username']").val();var surname=$("input[name='sername']").val();var patronymic=$("input[name='father']").val();var email=$("input[name='email']").val();var password=$("input[name='pass']").val();var retype_password=$("input[name='repass']").val();if(password!=retype_password){$("#text_error").html("Паролі не співпадають");return 0}
var post_query={name:name,surname:surname,email:email,patronymic:patronymic,password:password};$.post("/ajax/register.php",post_query,function(post_answer){if(post_answer=="error0"){$("#text_error").html("Невідома помилка");return 0}
if(post_answer=="error1"){$("#text_error").html("Короткий пароль");return 0}
if(post_answer=="error2"){$("#text_error").html("Не введене ім'я");return 0}
if(post_answer=="error3"){$("#text_error").html("Не введене прізвище");return 0}
if(post_answer=="error4"){$("#text_error").html("Не введене по-батькові");return 0}
if(post_answer=="error5"){$("#text_error").html("Невірний формат емейлу");return 0}
if(post_answer=="error6"){$("#text_error").html("Користувач з даним емейл уже зареєстрований");return 0}
if(post_answer=="error7"){$("#text_error").html("В полях ім'я/прізвище/по-батькові використовуються заборонені символи");return 0}
$("#text_error").html("Все ок");window.location.href="https://cpp.server-user.info"})})