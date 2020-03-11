<?php

use App\Enums\dataLinks\CCreporttype;
use App\Enums\HallsType;
use App\Enums\DegreeType;
use App\Enums\GenderType;
use App\Enums\GradeType;
use App\Enums\LangType;
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
use App\Enums\ClassbusType;
use App\Enums\GearboxType;
use App\Enums\BusStatusType;
use App\Enums\ScheduleType;
use App\Enums\PayType;
use App\Enums\BranchType;
use App\Enums\LevelType;
//data links
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
use App\Enums\SecondaryTypeList;

return [


    // SecondaryTypeList
    SecondaryTypeList::class => [
        SecondaryTypeList::Vocabulary => 'Vocabulary',
        SecondaryTypeList::structure => 'structure',
        SecondaryTypeList::essay => 'essay',
        SecondaryTypeList::translation => 'translation',
        SecondaryTypeList::exercies => 'exercies',
    ],

    HallsType::class => [
        HallsType::Hall_1 => 'Hall 1',
        HallsType::Hall_2 => 'Hall 2',
        HallsType::Hall_3 => 'Hall 3',
        HallsType::Hall_4 => 'Hall 4',
        HallsType::Hall_5 => 'Hall 5',
    ],
    CCreporttype::class => [
        CCreporttype::level => 'Balances of cost centers by level',
        CCreporttype::individual => 'Sub - cost balances',

    ],
    GenderType::class => [
        GenderType::male => 'male',
        GenderType::female => 'female',
    ],
    DegreeType::class => [
        DegreeType::None => 'None',
        DegreeType::primary => 'primary',
        DegreeType::preparatory => 'None',
        DegreeType::High_school => 'High school',
        DegreeType::Diploma => 'Diploma',
        DegreeType::Diploma_2 => 'Technical Diploma',
        DegreeType::Diploma_3 => 'Trading Diploma',
        DegreeType::Bachelor => 'Bachelor',
        DegreeType::Licentiate => 'Licentiate',
        DegreeType::Master => 'Master',
        DegreeType::Doctorate => 'Doctorate',
    ],
    GradeType::class => [
        GradeType::acceptable => 'acceptable',
        GradeType::good => 'good',
        GradeType::verygood => 'very good',
        GradeType::excellent => 'excellent',
    ],
    LangType::class => [
        LangType::arabic => 'arabic',
        LangType::english => 'english',
        LangType::french => 'french',
        LangType::russian => 'russian',
        LangType::japanese => 'japanese',
        LangType::chinese => 'chinese',
        LangType::spanish => 'spanish',
        LangType::italian => 'italian',
    ],
    BranchType::class => [
        BranchType::school => 'school',
        BranchType::branche => 'branche',
    ],
    LevelType::class => [
        LevelType::accounts => 'Accounts',
        LevelType::cost_centers => 'Cost Centers',
        LevelType::final_account => 'Final Account',
        LevelType::center_analysis => 'Center Analysis',
    ],
    TypeType::class => [
        TypeType::student => 'student',
        TypeType::single => 'single',
        TypeType::company => 'company',
        TypeType::domestic_flights => 'domestic flights',
    ],
    RelationType::class => [
        RelationType::father => 'father',
        RelationType::mother => 'mother',
        RelationType::brother => 'brother',
        RelationType::sister => 'sister',
        RelationType::grandfather => 'grandfather',
        RelationType::grandmother => 'grandmother',
        RelationType::Stepfather => 'Stepfather',
        RelationType::HusbandAunt => 'HusbandAunt',
        RelationType::uncle => 'uncle',
        RelationType::aunt => 'aunt',
        RelationType::uncle_M => "uncle from mother",
        RelationType::aunt_M => 'aunt from mother',
        RelationType::brother_in_law => 'brother in law',
        RelationType::cousin => 'cousin',
        RelationType::husband => 'husband',
    ],
    ReligionType::class => [
        ReligionType::Muslim => 'Muslim',
        ReligionType::Christian => 'Christian',
        ReligionType::Jewish => 'Jewish',
        ReligionType::Others => 'Others',
    ],
    SocialType::class => [
        SocialType::Single => 'Single',
        SocialType::Married => 'Married',
        SocialType::Divorcee => 'Divorcee',
        SocialType::Widowed => 'Widowed',
    ],
    HealthType::class => [
        HealthType::Normal => 'Normal',
        HealthType::SpecialNeeds => 'Special Needs',
    ],
    WorkType::class => [
        WorkType::Basic => 'Basic',
        WorkType::Temporary => 'Temporary',
    ],
    LicenseType::class => [
        LicenseType::SpecialLicense => 'Special License',
        LicenseType::FirstClassLicense => 'First Class License',
        LicenseType::SecondClassLicense => 'Second Class License',
        LicenseType::ThirdClassLicense => 'Third Class License',
    ],
    BloodType::class => [
        BloodType::O => 'O+',
        BloodType::Om => 'O-',
        BloodType::A => 'A+',
        BloodType::Am => 'A-',
        BloodType::B => 'B+',
        BloodType::Bm => 'B-',
        BloodType::AB => 'AB+',
        BloodType::ABm => 'AB-',
    ],
    EducateType::class => [
        EducateType::preparatory => 'preparatory',
        EducateType::secondary => 'secondary',
        EducateType::QualifiedAverage => 'Qualified Average',
        EducateType::HighQualified => 'High Qualified',
    ],
    StatusType::class => [
        StatusType::Stopped => 'Stopped',
        StatusType::Serves => 'Serves',
        StatusType::InVacation => 'In Vacation',
        StatusType::Sick => 'Sick',
        StatusType::Damage => 'Damage',
        StatusType::Escape => 'Escape',
        StatusType::WithoutCar => 'Without Car',
    ],
    ExperianceType::class => [
        ExperianceType::LessThanYear => 'Less Than Year',
        ExperianceType::OneYear => 'One Year',
        ExperianceType::TwoYears => 'Two Years',
        ExperianceType::ThreeYears => 'Three Years',
        ExperianceType::FourYears => 'Four Years',
        ExperianceType::FiveYears => 'Five Years',
        ExperianceType::MoreThanFive => 'More Than Five Years',
    ],
    SupplierType::class => [
        SupplierType::GeneralSupplier => 'General Supplier',
        SupplierType::SupplierOfSpareParts => 'Supplier Of Spare Parts',
    ],
    CurrencyType::class => [
        CurrencyType::EGP => 'EGP',
        CurrencyType::USD => 'USD',
    ],
    ClassbusType::class => [
        ClassbusType::bus => 'bus',
        ClassbusType::minibus => 'minibus',
        ClassbusType::microbus => 'microbus'
    ],
    GearboxType::class => [
        GearboxType::automatic => 'automatic',
        GearboxType::manual => 'manual',
    ],
    ScheduleType::class => [
        ScheduleType::go => 'go',
        ScheduleType::rturn => 'return',
    ],
    BusStatusType::class => [
        BusStatusType::working => 'working',
        BusStatusType::noexist => 'no exist',
        BusStatusType::maintance => 'under maintance',
        BusStatusType::accident => 'accident',
        BusStatusType::stopedaccident => 'stoped accident',
        BusStatusType::stopedselling => 'stoped selling',
        BusStatusType::bookingtraffic => 'booking traffic',
        BusStatusType::withoutdriver => 'without driver',
        BusStatusType::stoped => 'stoped',
        BusStatusType::weekend => 'weekend',
    ],
    PayType::class => [
        PayType::bank => 'بنك',
        PayType::check => 'شيك',
        PayType::cache => 'نقدي',
    ],
    WorkStatusType::class => [
        WorkStatusType::yes => 'yes',
        WorkStatusType::no => 'no',

    ],
    SalaryType::class => [
        SalaryType::monthly => 'monthly',
        SalaryType::daily => 'daily',
    ],


//    data links
    ReceiptType::class => [
        ReceiptType::catchReceipt => 'Catch Receipt',
        ReceiptType::catchReceiptCheck => 'Catch Receipt by Check',
        ReceiptType::receipt => 'Receipt',
        ReceiptType::ReceiptCheck => 'Receipt by Check',
    ],
    OperationType::class => [
        OperationType::suppliers => 'Suppliers',
        OperationType::customers => 'Customers',
        OperationType::projects => 'Projects',
        OperationType::accounts => 'Accounts',
        OperationType::employees => 'Employees',
        OperationType::cashiers => 'Cashiers',
        OperationType::banks => 'Banks',
        OperationType::minus_document => 'Minus Document',
        OperationType::plus_document => 'Plus Document',
    ],
    FinaAccountType::class => [
        FinaAccountType::budget_elements => 'Budget Elements',
        FinaAccountType::incoming_list => 'Incoming List',
        FinaAccountType::money_flow_up => 'Money Flow Up',
    ],
    DiscounRevenueType::class => [
        DiscounRevenueType::revenue => 'Revenue Account',
        DiscounRevenueType::Discount => 'Discount Account',
    ],
    BondRestrictionsType::class => [
        BondRestrictionsType::inCash => 'Gl In Cash',
        BondRestrictionsType::inCheck => 'Gl In Check',
        BondRestrictionsType::outCash => 'Gl Out Cash',
        BondRestrictionsType::outCheck => 'Gl Out Check',
//        BondRestrictionsType::adjustment => 'Gl Adjustment',
//        BondRestrictionsType::inExchange => 'Gl In Exchange',
//        BondRestrictionsType::outExchange => 'Gl Out Exchange',
//        BondRestrictionsType::notificationMinus => 'Gl Notification Minus',
//        BondRestrictionsType::notificationPluse => 'Gl Notification Pluse',
//        BondRestrictionsType::discountInVoucher => 'Discount In Voucher',
//        BondRestrictionsType::discountOutVoucher => 'Discount Out Voucher',
//        BondRestrictionsType::purchasesReturn => 'Purchases Return',
//        BondRestrictionsType::salesReturn => 'Sales Return',
//        BondRestrictionsType::store => 'Store',
        BondRestrictionsType::daily => 'Daily',
        BondRestrictionsType::NoticeDebt => 'Notice Debt',
        BondRestrictionsType::NoticeCreditor => 'Notice Creditor',
        BondRestrictionsType::sales => 'Sales',
        BondRestrictionsType::purchases => 'Purchases',
        BondRestrictionsType::RevenuePayable => 'Revenue Payable',
        BondRestrictionsType::ExchangeOfMaterials => 'Exchange Of Materials',
        BondRestrictionsType::start => 'Gl Start',
    ],
    CcType::class => [
        CcType::withoutCc => 'Without Cc',
        CcType::withCc => 'With Cc',
        CcType::multi => 'multi Cc',
    ],
    StatusAccountType::class => [
        StatusAccountType::suspend => 'Suspend',
        StatusAccountType::open => 'Open',
        StatusAccountType::post => 'Post',
        StatusAccountType::confirmed => 'Confirmed',
    ],
    CategoryAccountType::class => [
        CategoryAccountType::dept => 'debt',
        CategoryAccountType::crpt => 'crpt',
    ],
    TypeAccountType::class => [
        TypeAccountType::main => 'Main',
        TypeAccountType::sub => 'Sub',
    ],
    InvoiceSaleType::class => [
        InvoiceSaleType::purchaseInvoice => 'Purchase Invoice',
        InvoiceSaleType::saleInvoice => 'Sale Invoice',
        InvoiceSaleType::other => 'Other',
    ],
    BankAppearType::class => [
        BankAppearType::bankClipboard => 'Bank appears within the scope of the clipboard',
        BankAppearType::bannkRestriction => 'Bank appears within the scope of the restrictions',
    ],
    AccountTypeType::class => [
        AccountTypeType::allAccounts => 'All Accounts',
        AccountTypeType::onlyTrans => 'Only Transaction',
        AccountTypeType::noTrans => 'No Transaction',
        AccountTypeType::deptAccounts => 'Dept Accounts',
        AccountTypeType::crtAccounts => 'Crt Accounts',
    ],
    BalanceReviewType::class => [
        BalanceReviewType::reviewBalance => 'Review Balance',
        BalanceReviewType::levelReview => 'Level Review Balance',
    ],
    ExpenseIncomeType::class => [
        ExpenseIncomeType::expense => 'Expense',
        ExpenseIncomeType::income => 'Income',
    ],
    LimitTimeType::class => [
        LimitTimeType::firstDate => 'First Date',
        LimitTimeType::inTime => 'In Come',
    ],
    IncomeListType::class => [
        IncomeListType::budget => 'Budget',
        IncomeListType::tradeAccount => 'income list',
        IncomeListType::operatingAccount => 'Operating Account',
    ],
    StatusTreeType::class => [
        StatusTreeType::active => 'active',
        StatusTreeType::deactive => 'deactive',
    ],
    LimitationsType::class => [
        LimitationsType::dailyLimitations => 'Daily Limitations',
        LimitationsType::NoticeDebt => 'Notice Debt',
        LimitationsType::NoticeCreditor => 'Notice Creditor',
        LimitationsType::SalesInvoice => 'Sales Invoice',
        LimitationsType::PurchaseInvoice => 'Purchase Invoice',
        LimitationsType::RevenuePayable => 'Revenue Payable',
        LimitationsType::ExchangeOfMaterials => 'Exchange Of Materials',
    ],
    MonthType::class => [
        MonthType::January => 'January',
        MonthType::February => 'February',
        MonthType::March => 'March',
        MonthType::April => 'April',
        MonthType::May => 'May',
        MonthType::June => 'June',
        MonthType::July => 'July',
        MonthType::August => 'August',
        MonthType::September => 'September',
        MonthType::October => 'October',
        MonthType::November => 'November',
        MonthType::December => 'December',
    ],
    DepartmentReportType::class => [
        DepartmentReportType::levelNumber => 'level Number',
        DepartmentReportType::trustAccounts => 'trust Accounts',
        DepartmentReportType::DeptDepartement => 'Deptor Departement',
        DepartmentReportType::CrdDepartement => 'Creditor Departement',
        DepartmentReportType::PersonalDepartement => 'Personal Departement',
        DepartmentReportType::BranchDepartement => 'Branch Departement',
    ],
];
