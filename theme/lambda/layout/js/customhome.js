function exploreexamdata(a){$.ajax({type:"POST",url:"http://learning.preparetest.com/blocks/searchdashboard/ajaxdata.php",data:{action:"exploreexam",dataid:a},cache:!1,beforeSend:function(){$("#loader").css("display","block"),$("#menu1").css("display","none")},complete:function(){$("#loader").css("display","none"),$("#menu1").css("display","block")},success:function(a){$("#loader").css("display","none"),$("#menu1").css("display","block"),$("#exploredata").html(a)}})}$(".myexplore").owlCarousel({loop:!1,margin:10,nav:!0,mouseDrag:!1,navText:["<i class='l_ef fa fa-angle-double-left' ></i>","<i class='r_eh fa fa-angle-double-right' ></i>"],autoplay:!1,autoplayHoverPause:!0,responsive:{0:{items:2},600:{items:3},1000:{items:5}}}),$(document).ready(function(){
var owl = $('.category_exams');
              owl.owlCarousel({
                stagePadding: 50,
                margin: 10,
                
                nav: true,
                loop: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 5
                  }
                }
              })

	$("#searchdata").on("keyup",function(){var a=$(this).val();a.length>0?jQuery.ajax({type:"POST",url:"http://learning.preparetest.com/blocks/searchdashboard/ajaxdata.php",data:{action:"datasearch",title:a},success:function(a){$("#filterSearchdata").html(a)}}):$("#filterSearchdata").html("")}),$(".item").on("click",function(){$(this).removeClass("active")}),$(".item").on("click",function(){exploreexamdata($(this).attr("data-id"))})}),exploreexamdata("3"),$("#menu1").css("display","none"),$(".owl-stage-outer a").on("click",function(){$(".item.current").removeClass("current"),$(this).addClass("current")});