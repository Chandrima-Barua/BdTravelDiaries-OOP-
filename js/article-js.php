<script>
  $(document).ready(function(){

    $(".signinform").on( 'click', '.signin',function (e) {
        var name = $("#name").val();
        console.log(name);
        $(".main").html("");
        $.ajax({
            type: "get",
            url: "signin.php",
            dataType : 'json',
            data: {
                name: name,

            },
            success: function (data) {
                console.log(data)
                after_update = [];
                for (j = 0; j < Object.keys(data).length; j++) {
                    after_update.push(data[j]);
                }

                console.log(after_update);

                header = "<h2>BANGLADESH TRAVEL DIARIES</h2>";
                $(".main").before(header);


                footer = "<div class='form'><label style='padding-right: 30px'><b>Post a new Article: </b></label><input type='articletext' id='articletitle' placeholder='Enter your article articletitle here' name='articletitle'>&nbsp<label  style='padding-left: 20px'><b class='username' session='" + name + "' >Signed in as: [" + name + "] </b></label><br><br><input type='articletext' id='art' placeholder='Type your article here' name='article'><button type='submit' id='post'>Post</button></div>";
                $(".main").after(footer);


             for( i = 0; i< after_update.length ; i++){

                    if (name === after_update[i]['username']) {
                        strings = "<div class='all_post' id=" + after_update[i]['articlenumber'] + " number=" + after_update[i]['articlenumber'] + "><ul><li><span>" + after_update[i]['articletitle'] + "</span><li class='date'> " + after_update[i]['username'] + "| " + after_update[i]['publishtime'] + "</li><br><li class='date'>" + after_update[i]['articletext'] + "</li></ul></div>";
                        $(".main").append(strings);
                    } else {
                        strings = "<div class='all_post' id='" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "'><ul><li><span>" + after_update[i]['articletitle'] + "</span><input type='button' value='Flag' style='float: right' class='flag' id='flag_" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "'><div  class='opt' id='opt_" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "' style='display: none'><ul class='li_op'>";

                        if (after_update[i]['flagabusive'] === false) {

                            abusives = "<li><input type='checkbox' class='abusive checked' checked='checked' id='abusive_" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "' />Abusive<span class='close' id='close_" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "'>X</span><span style='display: none' id='abs_" + after_update[i]['articlenumber'] + "'></span></li>";
                        } else {

                            abusives = "<li><input type='checkbox' class='abusive unchecked' id='abusive_" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "'/>Abusive<span class='close' id='close_" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "'>X</span></li>";
                        }
                        if (after_update[i]['flagspam'] === false) {

                            spams = "<li><input type='checkbox' class='spam checked' checked='checked' id='spam_" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "'/>Spam</li>";
                        } else {
                            spams = "<li><input type='checkbox' class='spam unchecked' id='spam_" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "'/>Spam</li>";
                        }
                        if (after_update[i]['flagcopyright'] === false) {

                            copyrighteds = "<li><input type='checkbox' class='copyrighted checked' checked='checked' id='copyrighted_" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "'/>Copyrighted<button class='report' id='report_" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "'>Report</button></li>";
                        } else {
                            copyrighteds = "<li><input type='checkbox' class='copyrighted unchecked' id='copyrighted_" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "'/>Copyrighted<button class='report' id='report_" + after_update[i]['articlenumber'] + "' number='" + after_update[i]['articlenumber'] + "'>Report</button></li>";
                        }

                        last = "</ul></div></li><li class='date'>" + after_update[i]['username'] + "|" + after_update[i]['publishtime'] + "</li><br><li class='date'>" + after_update[i]['articletext'] + "</li></ul></div>";

                        $(".main").append(strings + abusives + spams + copyrighteds + last);

                    }
                }


                 username = $(".username").attr("session");
                var publishtime = new Date();
                var month = publishtime.getMonth() + 1;
                 update_publishtime = publishtime.getUTCDate() + "/" + month + "/" + publishtime.getUTCFullYear() + "-" + publishtime.getHours() + ":" + publishtime.getMinutes() + ":" + publishtime.getSeconds() + '' + 'GMT';
                record = 0;
                abusive = 0;
                spam = 0;
                copyrighted = 0;
                $(".abusive").click(function () {
                art_number = parseInt($(this).attr('number'));
                if ($(this).hasClass('unchecked')) {
                    $(this).addClass('checked').removeClass('unchecked');
                    // abusive = parseInt($("#abs_" + art_number).articletext());
                    abusive = 1;
                    console.log(abusive);
                    // $("#abs_" + art_number).articletext(abusive);


                } else {
                    $(this).addClass('unchecked').removeClass('checked');
                    // abusive = parseInt($("#abs_" + art_number).articletext());
                    abusive = -1;
                    console.log(abusive);
                    // $("#abs_" + art_number).articletext(abusive);
                    record = 1;
                }
                });
                // abusive = 0;

                $(".spam").click(function () {
                    art_number = parseInt($(this).attr('number'));
                    if ($(this).hasClass('unchecked')) {
                        $(this).addClass('checked').removeClass('unchecked');
                        // spam = parseInt($("#sp_" + art_number).articletext());
                        spam = 1;
                        console.log(spam);
                        // $("#sp_" + art_number).articletext(spam);


                    } else {
                        $(this).addClass('unchecked').removeClass('checked');
                        // spam = parseInt($("#sp_" + art_number).articletext());
                        spam = -1;
                        console.log(spam);
                        // $("#sp_" + art_number).articletext(spam);
                        record = 1;
                    }
                    // spam = 0;
                });
                $(".copyrighted").click(function () {
                    art_number = parseInt($(this).attr('number'));
                    if ($(this).hasClass('unchecked')) {
                        $(this).addClass('checked').removeClass('unchecked');
                        // copyrighted = parseInt($("#copy_" + art_number).articletext());
                        copyrighted = 1;
                        console.log(copyrighted);
                        // $("#copy_" + art_number).articletext(copyrighted);

                    } else {
                        $(this).addClass('unchecked').removeClass('checked');
                        // copyrighted = parseInt($("#copy_" + art_number).articletext());
                        copyrighted = -1;
                        console.log(copyrighted);
                        // $("#copy_" + art_number).articletext(copyrighted);
                        record = 1;
                    }
                    // copyrighted = 0;
                });


                $(".report").click(function () {

                    // console.log(username);
                    // console.log(art_number);
                    // console.log(abusive);
                    // console.log(spam);
                    // console.log(copyrighted);
                    // console.log(update_publishtime);
                    // console.log(record);
                    if (abusive !== 0 || spam !== 0 || copyrighted !== 0) {

                        $.ajax({
                            type: "POST",
                            url: "flag-add.php",
                            // dataType: 'json',
                            data: {
                                username: username,
                                art_number: art_number,
                                abusive: abusive,
                                spam: spam,
                                copyrighted: copyrighted,
                                update_publishtime: update_publishtime,
                                record: record
                            },
                            success: function (data) {
                                console.log(data);
                            }

                        });
                    }
                    // else
                    // {
                    //     alert("please select atleast one input");
                    // }
                    $("[id^=opt_" + art_number).hide();
                    abusive = 0;
                    spam = 0;
                    copyrighted = 0;
                    record = 0;
                    // $('input[type=checkbox]').each(function()
                    // {
                    //     this.checked = false;
                    // });


                });

            }
        });
    });

      $(".signinform").on( 'click', '#post',function (e) {
          var articletitle = $("#articletitle").val();
          console.log(articletitle);
          var username = $(".username").attr("session");
          console.log(username);

          var art = $("#art").val();
          console.log(art);

          var publishtime = new Date();
          var month = publishtime.getMonth() + 1;
          update_publishtime = publishtime.getUTCDate() + "/" + month + "/" + publishtime.getUTCFullYear() + "-" + publishtime.getHours() + ":" + publishtime.getMinutes() + ":" + publishtime.getSeconds() + '' + 'GMT';
          console.log(update_publishtime);


          if (username == "" && articletitle == "" && art == "") {
              $("#post").attr("disabled", true);
          } else {
              strings = "<div class='all_post'><ul><li><span>" + articletitle + "</span></li><li class='date'>" + username + "| " + update_publishtime + "</li><br><li class='date'>" + art + "</li></ul></div>";
              $(".all_post").parent().children().last().after(strings);

              $.ajax({
                  type: "POST",
                  url: "articles-add.php",
                  dataType: 'json',
                  data: {username: username, articletitle: articletitle, art: art, update_publishtime: update_publishtime},
                  success: function (data) {
                      console.log(data);
                  }
              });
              $('#articletitle').val('');
              $('#art').val('');
          }
      });


      //flag option
      $(".signinform").on("click", ".flag", function (event) {
          var art_number = parseInt($(this).attr('number'));

          console.log(art_number);
          $("[id^=opt_" + art_number).show();
          $("[id^=close_" + art_number).click(function (e) {
              $("[id^=opt_" + art_number).hide();
          });
      });

  });

</script>