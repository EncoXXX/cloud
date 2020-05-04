$(".container-login100-form-btn").click(function(){
  var email = $("input[name='email']").val();
  var password = $("input[name='pass']").val();

  var idemail = document.querySelector("#id_email");
  var idpass = document.querySelector("#id_pass");

  if(email == ""){
    $("#text_error").html("Введіть емейл");
    idemail.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
    idemail.setAttribute("data-validate", "Введіть емейл");
    return 0;
  }
  if(password == ""){
    $("#text_error").html("Введіть пароль");
    idpass.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
    idpass.setAttribute("data-validate", "Введіть пароль");
    return 0;
  }


  var post_query = {
    email: email,
    password: password
  }

  $.post("/ajax/login.php",post_query,function(post_answer){
    if(post_answer == "error"){
      $("#text_error").html("Невірний логін або пароль");
      idemail.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
    idemail.setAttribute("data-validate", "Невірний логін або пароль");
    idpass.setAttribute('class','alert-validate wrap-input100 validate-input m-b-36');
    idpass.setAttribute("data-validate", "Невірний логін або пароль");
      return 0;
    }
    window.location.href="https://cpp.server-user.info";
  })
})
