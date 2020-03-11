$(document).ready(function(){
    $(".news_block").hide(0);
    $(".news_block[id='news1']").show(0);
    $(".hide_all").click(function(){
        $(this).parent().parent().find("aside").slideToggle();
        $(this).find("i").toggleClass("fa-chevron-down fa-chevron-up");
        $(this).find("span").html(function(){
        if ($(this).html()=="اظهار") {
            $(this).html("اخفاء");
        }else if($(this).html()=="اخفاء"){
            $(this).html("اظهار");
        }
        });
    });
    $(".some_news").click(function(){
        $(this).addClass("active").parent().parent().siblings().find("aside").removeClass("active")
    });
    $(".news_title").click(function(event){
        $(this).data("news");
        $(".news_block").hide(0);
        $(".news_block[id="+$(this).data("news")+"]").show(0);
        console.log($(this).data("news"));
    });

    // cv page
    $(".btn1-add-table").click(function () {
        $('.tb1 tr:last').after('<tr><td><select><option>اختر الدرجة العلمية</option><option>دبلوم</option><option>متوسط</option><option>يكاليريوس</option><option>ماجستير</option></select></td><td><select><option>اختر الكلية او المعهد</option><option>طب</option><option>هندسة</option><option>تجارة</option><option>حاسبات ومعلومات</option></select></td><td><select><option>اختر الجامعة او الاكاديمية</option><option>الدلتا</option><option>السلاب</option><option>النيل</option><option>الزرقا</option></select></td><td><select class="form-control"><option>اختر التقدير</option><option>ممتاز</option><option>جيد جدا</option><option>جيد</option><option>مقلول</option></select></td><td><select class="form-control"><option>اختر تاريخ التحرج</option><option value="1950">1950</option><option value="1950">1959</option><option value="2019">2019</option></select></td></tr>');
    });

   // $(".btn2-add-table").click(function () {
   //      $('.tb2 tr:last').after('<tr><td><input type="text" placeholder="ادخل اسم الشركة"></td><td><input class="form-control" type="text" onfocus="(this.type=\'date\')" onfocusout="(this.type=\'text\')" placeholder="من"></td><td><input class="form-control" type="text" onfocus="(this.type=\'date\')" onfocusout="(this.type=\'text\')" placeholder="الى"></td></tr>');
   //  });

    $(".btn3-add-table").click(function () {
        $('.tb3 tr:last').after('<tr><td><select><option>اختر اللغة</option><option>انجليزى</option><option>المانى</option><option>فرنسى</option><option>اسبانى</option></select></td><td><select><option>قراءة</option><option>ضعيف</option><option>جيد</option><option>جيد جدا</option><option>ممتاز</option></select></td><td><select><option>كتابة</option><option>ضعيف</option><option>جيد</option><option>جيد جدا</option><option>ممتاز</option></select></td><td><select><option>فهم</option><option>ضعيف</option><option>جيد</option><option>جيد جدا</option><option>ممتاز</option></select></td></tr>');
    });

    $(".btn4-add-table").click(function () {
        $('.tb4 tr:last').after('<tr><td><input type="text" placeholder="ادخل الدورة التدربية"></td></tr>');
    });

    // h1-tittle
    // $('.navbar-toggler').click(function(){
    //     var x = document.getElementsByClass("navbar-toggler").getAttribute("aria-expanded");
    //     console.log('x');
    //     // if(x == 'true'){
    //     //     $('.h1_title').hide();
    //     // }
    // });
    $(".navbar-toggler").click(function(){
        $("#navbarNavDropdown").slideToggle(500)
    })
    $(".setting_bar").click(function(){
        $(".sidebar_profile").toggleClass('sidebar_profile_left','')
    })
});
