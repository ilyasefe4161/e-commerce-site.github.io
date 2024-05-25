$(document).ready(function(){

    $.SoruIcerigiGoster =   function(ElemanID){
        var QuestionID  =   ElemanID;
        var IslenecekAlan   =   "#" + ElemanID;
        $(".QuestionAnswerArea").slideUp();
        $(IslenecekAlan).parent().find(".QuestionAnswerArea").slideToggle();
    }
});

// $(document).ready(function() {
//     $("#dugme").click(function () {
//       alert("selam");
//     });
//   });