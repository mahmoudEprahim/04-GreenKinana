<?php
use App\Enums\HallsType;
use App\Enums\EducationLevelType;
use App\Enums\EduLevelType;
use App\Enums\PerstatusType;
use App\Enums\MedicalAttentionType;
use App\Enums\EmployeesSonsType;
use \App\Enums\Lecture;

use App\Enums\SpecialNeedsType;
use App\Enums\word_list;
use App\Enums\learntimeType;
use App\Enums\SecondaryGate;
use App\Enums\GenderType;
use App\Enums\DegreeType;
use App\Enums\SalaryType;
use App\Enums\TypeType;
use App\Enums\RelationType;
use App\Enums\ReligionType;
use App\Enums\SocialType;
use App\Enums\WorkStatusType;
use App\Enums\WorkType;
use App\Enums\LicenseType;
use App\Enums\HealthType;
use App\Enums\BloodType;
use App\Enums\EducateType;
use App\Enums\StatusType;
use App\Enums\ExperianceType;
use App\Enums\SupplierType;
use App\Enums\CurrencyType;
use App\Enums\GradeType;
use App\Enums\LangType;
use App\Enums\ClassbusType;
use App\Enums\GearboxType;
use App\Enums\BusStatusType;
use App\Enums\ScheduleType;
use App\Enums\PayType;
use App\Enums\BranchType;
use App\Enums\LevelType;
use App\Enums\EnglishGate;
//data links

use App\Enums\dataLinks\CCreporttype;
use App\Enums\dataLinks\CCacountType;
use App\Enums\dataLinks\OperationType;
use App\Enums\dataLinks\FinaAccountType;
use App\Enums\dataLinks\DiscounRevenueType;
use App\Enums\dataLinks\BondRestrictionsType;
use App\Enums\dataLinks\CcType;
use App\Enums\dataLinks\StatusAccountType;
use App\Enums\dataLinks\CategoryAccountType;
use App\Enums\dataLinks\TypeAccountType;
use App\Enums\dataLinks\InvoiceSaleType;
use App\Enums\dataLinks\BankAppearType;
use App\Enums\dataLinks\AccountTypeType;
use App\Enums\dataLinks\BalanceReviewType;
use App\Enums\dataLinks\ExpenseIncomeType;
use App\Enums\dataLinks\LimitTimeType;
use App\Enums\dataLinks\IncomeListType;
use App\Enums\dataLinks\StatusTreeType;
use App\Enums\dataLinks\ReceiptType;
use App\Enums\dataLinks\LimitationsType;
use App\Enums\dataLinks\MonthType;
use App\Enums\dataLinks\DepartmentReportType;
use App\Enums\MonthName;
use App\Enums\SecondaryTypeList;


return [

    // monthName
    MonthName::class => [
        MonthName::January => 'January',
        MonthName::february => 'February',
        MonthName::March => 'March',
        MonthName::April => 'April',
        MonthName::May => 'May',
//        MonthName::June => 'يونيو',
//        MonthName::July => 'يوليو',
        MonthName::August => 'August',
        MonthName::September => 'September',
        MonthName::October => 'October',
        MonthName::November => 'November',
        MonthName::December => 'December',

    ],


    Lecture::class => [
        Lecture::lec_1 => 'Lecture 1',
        Lecture::lec_2 => 'Lecture 2',
        Lecture::lec_3 => 'Lecture 3',
        Lecture::lec_4 => 'Lecture 4',
        Lecture::lec_5 => 'Lecture 5',
        Lecture::lec_6 => 'Lecture 6',
        Lecture::lec_7 => 'Lecture 7',
        Lecture::lec_8 => 'Lecture 8',
        Lecture::lec_9 => 'Lecture 9',
        Lecture::lec_10 => 'Lecture 10',
        Lecture::lec_11 => 'Lecture 11',
        Lecture::lec_12 => 'Lecture 12',
    ],


    // SecondaryTypeList
    // SecondaryTypeList::class => [
    //     SecondaryTypeList::Vocabulary => 'كلمات',
    //     SecondaryTypeList::structure => 'قواعد',
    //     SecondaryTypeList::essay => 'مقالات',
    //     SecondaryTypeList::translation => 'ترجمة',
    //     SecondaryTypeList::exercies => 'تمارين',
    // ],




//department
    HallsType::class => [
        HallsType::Hall_1 => 'قاعة 1',
        HallsType::Hall_2 => 'قاعة 2',
        HallsType::Hall_3 => 'قاعة 3',
        HallsType::Hall_4 => 'قاعة 4',
        HallsType::Hall_5 => 'قاعة 5',
    ],
    GenderType::class => [
        GenderType::male => 'ذكر',
        GenderType::female => 'أنثي',
    ],
    DegreeType::class => [
        DegreeType::None => 'بدون مؤهل',
        DegreeType::primary => 'ابتدائي',
        DegreeType::preparatory => 'اعدادي',
        DegreeType::High_school => 'الثانوية العامة',
        DegreeType::Diploma => 'دبلوم',
        DegreeType::Diploma_2 => 'دبلوم صنايع',
        DegreeType::Diploma_3 => 'دبلوم تجارى',
        DegreeType::Bachelor => 'بكالوريوس',
        DegreeType::Licentiate => 'ليسانس',
        DegreeType::Master => 'ماجستير',
        DegreeType::Doctorate => 'دكتوراه',
    ],
    GradeType::class => [
        GradeType::acceptable => 'مقبول',
        GradeType::good => 'جيد',
        GradeType::verygood => 'جيد جدا',
        GradeType::excellent => 'ممتاز',
    ],
    PerstatusType::class => [
        PerstatusType::regularity => 'منتظم',
        PerstatusType::irregular => 'غير منتظم',
        PerstatusType::coming => 'عام قادم',
        PerstatusType::waiting => 'انتظار',
    ],
    LangType::class => [
        LangType::arabic => 'عربي',
        LangType::english => 'انجليزي',
        LangType::french => 'فرنسي',
        LangType::russian => 'روسي',
        LangType::japanese => 'ياباني',
        LangType::chinese => 'صيني',
        LangType::spanish => 'أسباني',
        LangType::italian => 'ايطالي',
    ],
    BranchType::class => [
        BranchType::school => 'مدرسه',
        BranchType::branche => 'فرع',
    ],
    TypeType::class => [
        TypeType::student => 'طالب',
        TypeType::single => 'فردي',
        TypeType::company => 'شركة',
        TypeType::domestic_flights => 'رحلات داخليه',
    ],
    RelationType::class => [
        RelationType::father => 'أب',
        RelationType::mother => 'أم',
        RelationType::brother => 'أخ',
        RelationType::sister => 'أخت',
        RelationType::grandfather => 'جد',
        RelationType::grandmother => 'جدة',
        RelationType::Stepfather => 'زوج الأم',
        RelationType::HusbandAunt => 'زوج العمة',
        RelationType::uncle => 'عم',
        RelationType::aunt => 'عمة',
        RelationType::uncle_M => 'خال',
        RelationType::aunt_M => 'خالة',
        RelationType::brother_in_law => 'زوج الأخت',
        RelationType::cousin => 'ابن العم',
        RelationType::husband => 'زوج',
    ],
    ReligionType::class => [
        ReligionType::Muslim => 'مسلم',
        ReligionType::Christian => 'مسيحي',
        ReligionType::Jewish => 'يهودي',
        ReligionType::Others => 'ديانات أخري',
    ],
    SocialType::class => [
        SocialType::Single => 'أعزب',
        SocialType::Married => 'متزوج',
        SocialType::Divorcee => 'مطلق',
        SocialType::Widowed => 'أرمل',
    ],
    HealthType::class => [
        HealthType::Normal => 'طبيعي',
        HealthType::SpecialNeeds => 'احتياجات خاصه',
    ],
    WorkType::class => [
        WorkType::Basic => 'أساسي',
        WorkType::Temporary => 'احتياطي',
    ],
    LicenseType::class => [
        LicenseType::SpecialLicense => 'رخصه خاصه',
        LicenseType::FirstClassLicense => 'رخصه درجه أولي',
        LicenseType::SecondClassLicense => 'رخصه درجه تانيه',
        LicenseType::ThirdClassLicense => 'رخصه درجه تالته',
    ],
    BloodType::class => [
        BloodType::O => 'O موجب',
        BloodType::Om => 'O سالب',
        BloodType::A => 'A موجب',
        BloodType::Am => 'A سالب',
        BloodType::B => 'B موجب',
        BloodType::Bm => 'B سالب',
        BloodType::AB => 'AB موجب',
        BloodType::ABm => 'AB سالب',
    ],
    EducateType::class => [
        EducateType::preparatory => 'اعدادي',
        EducateType::secondary => 'ثانوي',
        EducateType::QualifiedAverage => 'مؤهل متوسط',
        EducateType::HighQualified => 'مؤهل عالي',
    ],
    StatusType::class => [
        StatusType::Stopped => 'ايقاف',
        StatusType::Serves => 'يعمل',
        StatusType::InVacation => 'في أجازه',
        StatusType::Sick => 'مريض',
        StatusType::Damage => 'عطل في السياره',
        StatusType::Escape => 'هروب',
        StatusType::WithoutCar => 'بدون سياره',
    ],
    ExperianceType::class => [
        ExperianceType::LessThanYear => 'أقل من سنه',
        ExperianceType::OneYear => 'سنه',
        ExperianceType::TwoYears => 'سنتين',
        ExperianceType::ThreeYears => 'ثلاث سنين',
        ExperianceType::FourYears => 'أربع سنين',
        ExperianceType::FiveYears => 'خمس سنين',
        ExperianceType::MoreThanFive => 'أكثر من خمس سنين',
    ],
    SupplierType::class => [
        SupplierType::GeneralSupplier => 'مورد عام',
        SupplierType::SupplierOfSpareParts => 'مورد قطع غيار',
    ],
    CurrencyType::class => [
        CurrencyType::EGP => 'جنيه مصري',
        CurrencyType::USD => 'دولار',
    ],
    ClassbusType::class => [
        ClassbusType::bus => 'أتوبيس',
        ClassbusType::minibus => 'ميني باص',
        ClassbusType::microbus => 'ميكروباص'
    ],
    GearboxType::class => [
        GearboxType::automatic => 'أتوماتيك',
        GearboxType::manual => 'عادي',
    ],
    ScheduleType::class => [
        ScheduleType::go => 'ذهاب',
        ScheduleType::rturn => 'عوده',
    ],
    BusStatusType::class => [
        BusStatusType::working => 'في الخدمه',
        BusStatusType::noexist => 'غير موجود',
        BusStatusType::maintance => 'في الصيانه',
        BusStatusType::accident => 'حادث',
        BusStatusType::stopedaccident => 'توقف-حادث',
        BusStatusType::stopedselling => 'توقف بيع',
        BusStatusType::bookingtraffic => 'حجز مروري',
        BusStatusType::withoutdriver => 'بدون سائق',
        BusStatusType::stoped => 'ايقاف',
        BusStatusType::weekend => 'نهاية الأسبوع',
    ],
    SalaryType::class => [
        SalaryType::monthly => 'شهري',
        SalaryType::daily => 'يومي',
    ],
    PayType::class => [
        PayType::bank => 'بنك',
        PayType::check => 'شيك',
        PayType::cache => 'نقدي',
    ],
    WorkStatusType::class => [
        WorkStatusType::yes => 'نعم',
        WorkStatusType::no => 'لا',
    ],
    EducationLevelType::class => [
        EducationLevelType::High_school => 'الثانوية العامة',
        EducationLevelType::Diploma => 'دبلوم',
        EducationLevelType::Bachelor => 'بكالوريوس',
        EducationLevelType::Licentiate => 'ليسانس',
        EducationLevelType::Master => 'ماجستير',
        EducationLevelType::Doctorate => 'دكتوراه',
    ],

//    data links

    ReceiptType::class => [
        ReceiptType::catchReceipt => 'سند قبض نقدي',
        ReceiptType::catchReceiptCheck => 'سند قبض شيك',
        ReceiptType::receipt => 'سند صرف نقدي',
        ReceiptType::ReceiptCheck => 'سند صرف شيك',
    ],
    LevelType::class => [
        LevelType::accounts => 'حسابات',
        LevelType::cost_centers => 'مراكز تكلفه',
        LevelType::final_account => 'حساب ختامي',
        LevelType::center_analysis => 'مركز تحليل',
    ],
    OperationType::class => [
        OperationType::suppliers => 'موردين',
        OperationType::customers => 'عملاء',
        OperationType::projects => 'مشروعات',
        OperationType::accounts => 'حسابات',
        OperationType::employees => 'موظفين',
        OperationType::cashiers => 'الصندوق',
        OperationType::banks => 'البنوك',
        OperationType::minus_document => 'اشعار خصم',
        OperationType::plus_document => 'اشعار اضافه',
    ],
    FinaAccountType::class => [
        FinaAccountType::budget_elements => 'بنود الميزانيه',
        FinaAccountType::incoming_list => 'قائمة الدخل',
        FinaAccountType::money_flow_up => 'تدفقات نقديه',
    ],
    DiscounRevenueType::class => [
        DiscounRevenueType::revenue => 'حساب الايرادات',
        DiscounRevenueType::Discount => 'حساب خصومات',
    ],
    BondRestrictionsType::class => [
        BondRestrictionsType::inCash => 'سند قبض نقدي',
        BondRestrictionsType::inCheck => 'سند قبض شيك',
        BondRestrictionsType::outCash => 'سند صرف نقدي',
        BondRestrictionsType::outCheck => 'سند صرف شيك',
//        BondRestrictionsType::adjustment => 'قيد تسويه',
//        BondRestrictionsType::inExchange => 'سند قبض حواله',
//        BondRestrictionsType::outExchange => 'سند صرف حواله',
//        BondRestrictionsType::notificationMinus => 'سند اشعار بالخصم',
//        BondRestrictionsType::notificationPluse => 'سند اشعار بالاضافه',
//        BondRestrictionsType::discountInVoucher => 'سند قبض خصم رصيد',
//        BondRestrictionsType::discountOutVoucher => 'سند صرف خصم رصيد',
//        BondRestrictionsType::store => 'قيد المخزون',
//        BondRestrictionsType::purchasesReturn => 'قيد مرتجع المشتريات',
//        BondRestrictionsType::salesReturn => 'قيد مرتجع المبيعات',
        BondRestrictionsType::daily => 'قيد يوميه',
        BondRestrictionsType::NoticeDebt => 'اشعار مدين',
        BondRestrictionsType::NoticeCreditor => 'اشعار دائن',
        BondRestrictionsType::sales => 'فاتورة المبيعات',
        BondRestrictionsType::purchases => 'فاتورة المشتريات',
        BondRestrictionsType::RevenuePayable => 'ايراد مستحق',
        BondRestrictionsType::ExchangeOfMaterials => 'صرف مواد',
        BondRestrictionsType::start => 'قيد افتتاحي',
    ],
    CcType::class => [
        CcType::withoutCc => 'بدون مركز',
        CcType::withCc => 'له مركز',
        CcType::multi => 'متعدد المراكز',
    ],
    StatusAccountType::class => [
        StatusAccountType::suspend => 'معلق',
        StatusAccountType::open => 'مفتوح',
        StatusAccountType::post => 'ترحيل',
        StatusAccountType::confirmed => 'اعتماد',
    ],
    CategoryAccountType::class => [
        CategoryAccountType::dept => 'مدين',
        CategoryAccountType::crpt => 'دائن',
    ],
    TypeAccountType::class => [
        TypeAccountType::main => 'رئيسي',
        TypeAccountType::sub => 'فرعي',
    ],
    InvoiceSaleType::class => [
        InvoiceSaleType::purchaseInvoice => 'فاتورة مبيعات',
        InvoiceSaleType::saleInvoice => 'فاتورة بيع',
        InvoiceSaleType::other => 'أخري',
    ],
    BankAppearType::class => [
        BankAppearType::bankClipboard => 'يظهر البنك داخل نطاق الحافظه',
        BankAppearType::bannkRestriction => 'يظهر البنك داخل نطاق القيود',
    ],
    AccountTypeType::class => [
        AccountTypeType::allAccounts => 'جميع الحسابات',
        AccountTypeType::onlyTrans => 'حسابات يوجد عليها حركه',
        AccountTypeType::noTrans => 'حسابات لايوجد عليها حركه',
        AccountTypeType::deptAccounts => 'حسابات ذات حركة مدينة فقط',
        AccountTypeType::crtAccounts => 'حسابات ذات حركة دائنة فقط',
    ],
    BalanceReviewType::class => [
        BalanceReviewType::reviewBalance => 'ميزان مراجعة الأستاذ المساعد',
        BalanceReviewType::levelReview => 'ميزان مراجعة حسب المستوي',
    ],
    ExpenseIncomeType::class => [
        ExpenseIncomeType::expense => 'مصروف',
        ExpenseIncomeType::income => 'ايراد',
    ],
    LimitTimeType::class => [
        LimitTimeType::firstDate => 'أول المده',
        LimitTimeType::inTime => 'حتي تاريخه',
    ],
    LimitTimeType::class => [
        LimitTimeType::firstDate => 'أول المده',
        LimitTimeType::inTime => 'حتي تاريخه',
    ],
    IncomeListType::class => [
        IncomeListType::budget => 'حساب ميزانية',
        IncomeListType::tradeAccount => 'حساب قائمة الدخل',
        IncomeListType::operatingAccount => 'حساب تشغيل',
    ],
    StatusTreeType::class => [
        StatusTreeType::active => 'نشط',
        StatusTreeType::deactive => 'متوقف',
    ],
    LimitationsType::class => [
        LimitationsType::dailyLimitations => 'قيد يوميه',
        LimitationsType::NoticeDebt => 'اشعار مدين',
        LimitationsType::NoticeCreditor => 'اشعار دائن',
        LimitationsType::SalesInvoice => 'فاتورة المبيعات',
        LimitationsType::PurchaseInvoice => 'فاتورة المشتريات',
        LimitationsType::RevenuePayable => 'ايراد مستحق',
        LimitationsType::ExchangeOfMaterials => 'صرف مواد',
    ],
    MonthType::class => [
        MonthType::January => 'يناير',
        MonthType::February => 'فبراير',
        MonthType::March => 'مارس',
        MonthType::April => 'ابريل',
        MonthType::May => 'مايو',
        MonthType::June => 'يونيو',
        MonthType::July => 'يوليو',
        MonthType::August => 'أغسطس',
        MonthType::September => 'سبتمبر',
        MonthType::October => 'أكتوبر',
        MonthType::November => 'نوفمبر',
        MonthType::December => 'ديسمبر',
    ],
    DepartmentReportType::class => [
        DepartmentReportType::levelNumber => 'برقم المستوي',
        DepartmentReportType::trustAccounts => 'حسابات الترصيد',
        DepartmentReportType::DeptDepartement => 'حسابات مدينه',
        DepartmentReportType::CrdDepartement => 'حسابات دائنه',
        DepartmentReportType::PersonalDepartement => 'حسابات رئيسيه',
        DepartmentReportType::BranchDepartement => 'حسابات فرعيه',
    ],
//enddepartment
    GenderType::class => [
        GenderType::male => 'ذكر',
        GenderType::female => 'أنثي',
    ],
    word_list::class => [
        word_list::OptionTwo   => 'الكلمات',
        word_list::OptionOne   => 'القواعد',

     ],
    SecondaryGate::class => [
        SecondaryGate::FsrtGrade   => 'الصف الاول الثانوي',
        SecondaryGate::SecondGrade   => 'الصف الثاني الثانوي',
        SecondaryGate::ThirdGrade   => 'الصف الثالث الثانوي1',

     ],
    EmployeesSonsType::class => [
        EmployeesSonsType::yes => 'نعم',
        EmployeesSonsType::no => 'لا',
    ],

    learntimeType::class => [
        learntimeType::fullyear => 'عام كامل',
        learntimeType::fullsemester => 'فصل دراسي كامل',
        learntimeType::Partofthefirstchapter => 'جزء من الفصل الأول',
        learntimeType::Partofthesecondchapter => 'جزء من الفصل الثاني',
    ],
    MedicalAttentionType::class => [
        MedicalAttentionType::yes => 'نعم',
        MedicalAttentionType::no => 'لا',
    ],
    SpecialNeedsType::class => [
        SpecialNeedsType::yes => 'نعم',
        SpecialNeedsType::no => 'لا',
    ],
    EduLevelType::class => [
        EduLevelType::primary => 'ابتدائي',
        EduLevelType::middle => 'متوسط',
        EduLevelType::secondary => 'ثانوي',
        EduLevelType::secondarynight => 'ثانوي ليلي',
    ],
];
