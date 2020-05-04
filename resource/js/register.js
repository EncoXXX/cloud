$(".login100-form-btn").click(function(){
  var name = $("input[name='username']").val();
  var surname = $("input[name='sername']").val();
  var patronymic = $("input[name='father']").val();
  var email = $("input[name='email']").val();
  var password = $("input[name='pass']").val();
  var retype_password = $("input[name='repass']").val();

  var idname = document.querySelector("#id_name");
  var idsename = document.querySelector("#id_sename");
  var idemail = document.querySelector("#id_email");
  var idfaname = document.querySelector("#id_faname");
  var idpass = document.querySelector("#id_pass");
  var idrepass = document.querySelector("#id_repass");

  if(password != retype_password){
   // $("#text_error").html("Паролі не співпадають");
    idpass.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
    idrepass.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
    idrepass.setAttribute("data-validate", "Паролі не співпадають");
    idpass.setAttribute("data-validate", "Паролі не співпадають");

    return 0;
  }
  var post_query = {
    name: name,
    surname: surname,
    email: email,
    patronymic: patronymic,
    password: password
  };

  $.post("/ajax/register.php",post_query,function(post_answer){
    if(post_answer == "ok"){
      $("#text_error").html("Все ок");
      window.location.href = "https://cpp.server-user.info";
    }

    post_answer = post_answer.split("-");

    post_answer.forEach(function(error){
      if(error == "error0"){
        $("#text_error").append("Невідома помилка<br>");
        idrepass.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
        idrepass.setAttribute("data-validate", "Невідома помилка");
        return 0;
        }
      if(error == "error1"){
        idpass.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
        idpass.setAttribute("data-validate", "Короткий пароль");
        $("#text_error").append("Короткий пароль<br>");
        return 0;
      }
      if(error == "error2"){
        $("#text_error").append("Не введене ім'я<br>");
        idname.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
        idname.setAttribute('data-validate', 'Не введене ім`я');
        return 0;
      }
      if(error == "error3"){
        $("#text_error").append("Не введене прізвище<br>");
        idsename.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
        idsename.setAttribute('data-validate', 'Не введене прізвище');
        return 0;
      }
      if(error == "error4"){
        $("#text_error").append("Не введене по-батькові<br>");
        idfaname.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
        idfaname.setAttribute("data-validate", "Не введене по-батькові");
        return 0;
      }
      if(error == "error5"){
        $("#text_error").append("Невірний формат емейлу<br>");
        idemail.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
        idemail.setAttribute("data-validate", "Невірний формат емейлу");
        return 0;
      }
      if(error == "error6"){
        $("#text_error").append("Користувач з даним емейл уже зареєстрований<br>");
        idemail.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
        idemail.setAttribute("data-validate", "Користувач з даним емейл уже зареєстрований");
        return 0;
      }
      if(error == "error7"){
        $("#text_error").append("В полі ім'я використовуються заборонені символи<br>");
        idname.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
        idname.setAttribute('data-validate', 'В полі ім\'я використовуються заборонені символи');
        return 0;
      }
      if(error == "error8"){
        $("#text_error").append("В полі прізвище використовуються заборонені символи<br>");
        idsename.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
        idsename.setAttribute("data-validate", "В полі прізвище використовуються заборонені символи");
        return 0;
      }
      if(error == "error9"){
        $("#text_error").append("В полі по-батькові використовуються заборонені символи<br>");
        idfaname.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
        idfaname.setAttribute("data-validate", "В полі по-батькові використовуються заборонені символи");
        return 0;
      }
    });
  })
})

function showValidate(input) {
  var thisAlert = $(input).parent();

  $(thisAlert).addClass('alert-validate');
}
