$("#add").on('click',function(){
    var name = $("input[name='name']").val();
    var phone = $("input[name='phone']").val();
    var email = $("input[name='email']").val();
    var account = $("input[name='account']").val();
    var password = $("input[name='password']").val();
    var markup = "<tr><td>" + name + "</td><td>" + phone + "</td><td>" + email + "</td><td>" + account + "</td><td>" + password + "</td><td><button type='button' name='edit' class='edit-member'>Edit</button><button type='button' name='save' class='save-member'>Save</button></td><td><button type='button' name='delete' class='delete-member'>Delete</button></td></tr>";
  $(".section3 .flex-container .member .fixed-new .overplay").fadeOut(500);
  $(".section3 .flex-container .member .fixed-new .new-account").fadeOut(500);
  $(".section3 .flex-container .member table tbody").append(markup);
  //edit
  $('button[name=edit]').click(function(){
    $(this).hide();
    $('td:nth-child(1)').each(function(){
      var content = $(this).html();
      $(this).html('<textarea>' + content + '</textarea>');
    });
    $('td:nth-child(2)').each(function(){
      var content = $(this).html();
      $(this).html('<textarea>' + content + '</textarea>');
    });
    $('td:nth-child(3)').each(function(){
      var content = $(this).html();
      $(this).html('<textarea>' + content + '</textarea>');
    });
    $('td:nth-child(4)').each(function(){
      var content = $(this).html();
      $(this).html('<textarea>' + content + '</textarea>');
    });
    $('td:nth-child(5)').each(function(){
      var content = $(this).html();
      $(this).html('<textarea>' + content + '</textarea>');
    });

    $('button[name=save]').show();
  });
  $('button[name=save]').click(function(){
    $('textarea:nth-child(1)').each(function(){
      var content = $(this).val();//.replace(/\n/g,"<br>");
      $(this).html(content);
      $(this).contents().unwrap();
    });
    $('textarea:nth-child(2)').each(function(){
      var content = $(this).val();//.replace(/\n/g,"<br>");
      $(this).html(content);
      $(this).contents().unwrap();
    });
    $('textarea:nth-child(3)').each(function(){
      var content = $(this).val();//.replace(/\n/g,"<br>");
      $(this).html(content);
      $(this).contents().unwrap();
    });
    $('textarea:nth-child(4)').each(function(){
      var content = $(this).val();//.replace(/\n/g,"<br>");
      $(this).html(content);
      $(this).contents().unwrap();
    });
    $('textarea:nth-child(5)').each(function(){
      var content = $(this).val();//.replace(/\n/g,"<br>");
      $(this).html(content);
      $(this).contents().unwrap();
    });
    $(this).hide();
    $('button[name=edit]').show();
  });
  //delete
  $(".section3 .flex-container .member table tbody tr td button[name='delete']").on('click',function(){
    $(this).parent().parent().remove();
  });
});
//delete
$(".section3 .flex-container .member table tbody tr td button[name='delete']").on('click',function(){
   var abc = $(this) ;
  $('.section3 .flex-container .member .delete').fadeIn(500);
  $('.section3 .flex-container .member .delete .choice-delete button[name="cancel-delete"]').on('click',function(){
    $('.section3 .flex-container .member .delete').fadeOut(500);
  });
  $('.section3 .flex-container .member .delete .choice-delete i').on('click',function(){
    $('.section3 .flex-container .member .delete').fadeOut(500);
  });
  $('.section3 .flex-container .member .delete .choice-delete button[name="yes-delete"]').on('click',function(){
    $(abc).parent().parent().remove();
    $('.section3 .flex-container .member .delete').fadeOut(500);
  });
});
//edit
$('button[name=edit]').click(function(){
  $(this).hide();
  var abc = $(this).parent().siblings(".edit");

  $(abc).each(function(){
    var content = $(this).html();
    $(this).html('<textarea>' + content + '</textarea>');
  });
  $(this).parent().find('.save-member').show();
});

$('button[name=save]').click(function(){
  $('textarea').each(function(){
    var content = $(this).val();//.replace(/\n/g,"<br>");
    $(this).html(content);
    $(this).contents().unwrap();
  });
  $(this).hide();
  $(this).parent().find('.edit-member').show();
});