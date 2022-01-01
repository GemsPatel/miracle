<?php
class Cron extends CI_Controller
{
    public function service_category()
    {
        $scArr = array();
        $scArr[] = "Advertising";
        $scArr[] = "Air Travel Agent";
        $scArr[] = "Airport Services";
        $scArr[] = "Architect";
        $scArr[] = "Asset managament (by other than Banking company)";
        $scArr[] = "ATM Operations, Management of Maintenance";
        $scArr[] = "Auctioneers' service, other than auction of property under direction or order of a count of or auction by center Govt.";
        $scArr[] = "Authorised Sevice Station";
        $scArr[] = "AuxilIry to General insurance/Life Insuarance.";
        $scArr[] = "Banking & Other Financial Services";
        $scArr[] = "Beaty Parlour";
        $scArr[] = "Broadcasting";
        $scArr[] = "Bussiness Auxiliary Services";
        $scArr[] = "Bussiness Exhibition Services";
        $scArr[] = "Bussiness Suppert Services";
        $scArr[] = "Cable Operator";
        $scArr[] = "Cargo Handling";
        $scArr[] = "Charted Accountant";
        $scArr[] = "Cleaning Service";
        $scArr[] = "Clearing & Forwarding Agent";
        $scArr[] = "Clubs and Associations";
        $scArr[] = "Commercial Trainning or Coaching";
        $scArr[] = "Company Secretary";
        $scArr[] = "Construction of Complex";
        $scArr[] = "Consulting Engineer";
        $scArr[] = "Convention Center";
        $scArr[] = "Cost Accountant";
        $scArr[] = "Courier";
        $scArr[] = "Credit Card, Debit Card, Charge Card or other Payment card related service";
        $scArr[] = "Credit Rating Agency";
        $scArr[] = "Custom House Agent";
        $scArr[] = "Design Services";
        $scArr[] = "Development & Supply of Content";
        $scArr[] = "Dredging";
        $scArr[] = "Dry Cleaning";
        $scArr[] = "Erection, Commissioning or Installation";
        $scArr[] = "Event ManagementFashion Designer";
        $scArr[] = "Forward Contract Services";
        $scArr[] = "Franchise Service";
        $scArr[] = "General Insurance";
        $scArr[] = "Health Club & Fitness Center";
        $scArr[] = "Intellectual Property Service";
        $scArr[] = "Interior Decorator";
        $scArr[] = "Internet Caff";
        $scArr[] = "Internet Telephony Service";
        $scArr[] = "Life Insuarance";
        $scArr[] = "Mailling List Compilation and Mailing";
        $scArr[] = "Management Consultant";
        $scArr[] = "managament, Maintenance or Repaire Service";
        $scArr[] = "Mandap keeper";
        $scArr[] = "Mandpower Recruitment or Supply Agency";
        $scArr[] = "Market Research Agency";
        $scArr[] = "Mining of Mineral, Oil or Gas";
        $scArr[] = "On-line information & Database Access or Retrival Service";
        $scArr[] = "Opinion Caterer";
        $scArr[] = "Packaging Service";
        $scArr[] = "Pandal OR Shamiyana Service";
        $scArr[] = "Photography";
        $scArr[] = "Port Service";
        $scArr[] = "Public Relations Service";
        $scArr[] = "Rail Travel Agent";
        $scArr[] = "Real Estate Agent / Consultant";
        $scArr[] = "Recovery Agent";
        $scArr[] = "Registar to an Issue";
        $scArr[] = "Rent - a - Cub Operator";
        $scArr[] = "Renting of Immovable Property";
        $scArr[] = "Sale oh space or time for Advertisement, other than print media";
        $scArr[] = "Scientific or Technical Consultancy";
        $scArr[] = "Security Agent";
        $scArr[] = "Share Transafer Agent";
        $scArr[] = "Ship MAnagement Service";
        $scArr[] = "Site Preparation";
        $scArr[] = "Sound Recording";
        $scArr[] = "Sponsorship service provided to any body corportation or firm, other than sponsorship of spots event";
        $scArr[] = "Steamer Agent";
        $scArr[] = "Stock Broker";
        $scArr[] = "Storage & Warehousing";
        $scArr[] = "Survey & Exploration of Minerals";
        $scArr[] = "Survey and Map Making";
        $scArr[] = "T.V. & radio ProgramProduction Services";
        $scArr[] = "Technical Testing & Analysis Agency / Technical Inspection & Certification Agency";
        $scArr[] = "Telecommunication Service";
        $scArr[] = "Tour Operator";
        $scArr[] = "Transport of goods by Air";
        $scArr[] = "Transport of goods by Road";
        $scArr[] = "Transport of goods in Containers by rail any person other than Government railway";
        $scArr[] = "Transport of goods other than water, through Piperline or other Conduct";
        $scArr[] = "Transport of  passengers Embarking on international journey by rail, other than economy class passengers";
        $scArr[] = "Transport of  persons by cruise ship";
        $scArr[] = "Travel Agent other than Air & Rail Travel";
        $scArr[] = "Underwriter";
        $scArr[] = "Video Tape Production";
        $scArr[] = "Works Contract";
        
        foreach ( $scArr as $sc )
        {
            $data['sc_name'] = $sc;
            $data['sc_status'] = 1;
            $this->db->insert( "service_category", $data );
        }
    }
    
    public function currency_with_code()
    {
        $cwArr = array();
        $cwArr[] = "AFGHANISTAN|Afghani|AFN|971";
        $cwArr[] = "ALBANIA|Lek|ALL|008";
        $cwArr[] = "ALGERIA|Algerian Dinar|DZD|012";
        $cwArr[] = "AMERICAN SAMOA|US Dollar|USD|840";
        $cwArr[] = "ANDORRA|Euro|EUR|978";
        $cwArr[] = "ANGOLA|Kwanza|AOA|973";
        $cwArr[] = "ANGUILLA|East Caribbean Dollar|XCD|951";
        $cwArr[] = "ANTIGUA AND BARBUDA|East Caribbean Dollar|XCD|951";
        $cwArr[] = "ARGENTINA|Argentine Peso|ARS|032";
        $cwArr[] = "ARMENIA|Armenian Dram|AMD|051";
        $cwArr[] = "ARUBA|Aruban Florin|AWG|533";
        $cwArr[] = "AUSTRALIA|Australian Dollar|AUD|036";
        $cwArr[] = "AUSTRIA|Euro|EUR|978";
        $cwArr[] = "AZERBAIJAN|Azerbaijanian Manat|AZN|944";
        $cwArr[] = "BAHAMAS (THE)|Bahamian Dollar|BSD|044";
        $cwArr[] = "BAHRAIN|Bahraini Dinar|BHD|048";
        $cwArr[] = "BANGLADESH|Taka|BDT|050";
        $cwArr[] = "BARBADOS|Barbados Dollar|BBD|052";
        $cwArr[] = "BELARUS|Belarussian Ruble|BYR|974";
        $cwArr[] = "BELGIUM|Euro|EUR|978";
        $cwArr[] = "BELIZE|Belize Dollar|BZD|084";
        $cwArr[] = "BENIN CFA|Franc BCEAO|XOF|952";
        $cwArr[] = "BERMUDA|Bermudian Dollar|BMD|060";
        $cwArr[] = "BHUTAN|Ngultrum|BTN|064";
        $cwArr[] = "BHUTAN|Indian Rupee|INR|356";
        $cwArr[] = "BOLIVIA (PLURINATIONAL STATE OF)|Boliviano|BOB|068";
        $cwArr[] = "BOLIVIA (PLURINATIONAL STATE OF)|Mvdol|BOV|984";
        $cwArr[] = "BONAIRE, SINT EUSTATIUS AND SABA|US Dollar|USD|840";
        $cwArr[] = "BOSNIA AND HERZEGOVINA|Convertible Mark|BAM|977";
        $cwArr[] = "BOTSWANA|Pula|BWP|072";
        $cwArr[] = "BOUVET ISLAND|Norwegian Krone|NOK|578";
        $cwArr[] = "BRAZIL|Brazilian Real|BRL|986";
        $cwArr[] = "BRITISH INDIAN OCEAN TERRITORY (THE)|US Dollar|USD|840";
        $cwArr[] = "BRUNEI DARUSSALAM|Brunei Dollar|BND|096";
        $cwArr[] = "BULGARIA|Bulgarian Lev|BGN|975";
        $cwArr[] = "BURKINA FASO|CFA Franc BCEAO|XOF|952";
        $cwArr[] = "BURUNDI|Burundi Franc|BIF|108";
        $cwArr[] = "CABO VERDE|Cabo Verde Escudo|CVE|132";
        $cwArr[] = "CAMBODIA|Riel|KHR|116";
        $cwArr[] = "CAMEROON|CFA Franc BEAC|XAF|950";
        $cwArr[] = "CANADA|Canadian Dollar|CAD|124";
        $cwArr[] = "CAYMAN ISLANDS (THE)|Cayman Islands Dollar|KYD|136";
        $cwArr[] = "CENTRAL AFRICAN REPUBLIC (THE)|CFA Franc BEAC|XAF|950";
        $cwArr[] = "CHAD|CFA Franc BEAC|XAF|950";
        $cwArr[] = "CHILE|Unidad de Fomento|CLF|990";
        $cwArr[] = "CHILE|Chilean Peso|CLP|152";
        $cwArr[] = "CHINA|Yuan Renminbi|CNY|156";
        $cwArr[] = "CHRISTMAS ISLAND|Australian Dollar|AUD|036";
        $cwArr[] = "COCOS (KEELING) ISLANDS (THE)|Australian Dollar|AUD|036";
        $cwArr[] = "COLOMBIA|Colombian Peso|COP|170";
        $cwArr[] = "COLOMBIA|Unidad de Valor Real|COU|970";
        $cwArr[] = "COMOROS (THE)|Comoro Franc|KMF|174";
        $cwArr[] = "CONGO (THE DEMOCRATIC REPUBLIC OF THE)|Congolese Franc|CDF|976";
        $cwArr[] = "CONGO (THE)	CFA|Franc BEAC|XAF|950";
        $cwArr[] = "COOK ISLANDS (THE)|New Zealand Dollar|NZD|554";
        $cwArr[] = "COSTA RICA|Costa Rican Colon|CRC|188";
        $cwArr[] = "CROATIA|Kuna|HRK|191";
        $cwArr[] = "CUBA|Peso Convertible|CUC|931";
        $cwArr[] = "CUBA|Cuban Peso|CUP|192";
        $cwArr[] = "CURAÇAO|Netherlands Antillean Guilder|ANG|532";
        $cwArr[] = "CYPRUS|Euro|EUR|978";
        $cwArr[] = "CZECH REPUBLIC (THE)|Czech Koruna|CZK|203";
        $cwArr[] = "CÔTE D'IVOIRE|CFA Franc BCEAO|XOF|952";
        $cwArr[] = "DENMARK|Danish Krone|DKK|208";
        $cwArr[] = "DJIBOUTI|Djibouti Franc|DJF|262";
        $cwArr[] = "DOMINICA|	East Caribbean Dollar|	XCD	|951";
        $cwArr[] = "DOMINICAN REPUBLIC (THE)|	Dominican Peso|	DOP|	214";
        $cwArr[] = "ECUADOR|	US Dollar	|USD	|840";
        $cwArr[] = "EGYPT	|Egyptian Pound|	EGP|	818";
        $cwArr[] = "EL SALVADOR	|El Salvador Colon|	SVC	|222";
        $cwArr[] = "EL SALVADOR|	US Dollar	|USD|	840";
        $cwArr[] = "EQUATORIAL GUINEA|	CFA Franc BEAC	|XAF|	950";
        $cwArr[] = "ERITREA|	Nakfa	|ERN	|232";
        $cwArr[] = "ESTONIA	|Euro	|EUR	|978";
        $cwArr[] = "ETHIOPIA	|Ethiopian Birr|	ETB	|230";
        $cwArr[] = "EUROPEAN UNION	|Euro	|EUR|	978";
        $cwArr[] = "FALKLAND ISLANDS (THE) [MALVINAS]|	Falkland Islands Pound|	FKP	|238";
        $cwArr[] = "FAROE ISLANDS (THE)|	Danish Krone	|DKK|	208";
        $cwArr[] = "FIJI	|Fiji Dollar	|FJD|	242";
        $cwArr[] = "FINLAND	|Euro	|EUR|	978";
        $cwArr[] = "FRANCE	|Euro	|EUR|	978";
        $cwArr[] = "FRENCH GUIANA|	Euro	|EUR|	978";
        $cwArr[] = "FRENCH POLYNESIA	|CFP Franc|	XPF|	953";
        $cwArr[] = "FRENCH SOUTHERN TERRITORIES (THE)|	Euro	|EUR|	978";
        $cwArr[] = "GABON	|CFA Franc |BEAC|	XAF|	950";
        $cwArr[] = "GAMBIA (THE)|	Dalasi	|GMD	|270";
        $cwArr[] = "GEORGIA|	Lari	|GEL|	981";
        $cwArr[] = "GERMANY|	Euro|	EUR	|978";
        $cwArr[] = "GHANA	|Ghana Cedi	|GHS	|936";
        $cwArr[] = "GIBRALTAR	|Gibraltar Pound|	GIP	|292";
        $cwArr[] = "GREECE	|Euro|	EUR	|978";
        $cwArr[] = "GREENLAND	|Danish Krone|	DKK	|208";
        $cwArr[] = "GRENADA|	East Caribbean Dollar|	XCD	|951";
        $cwArr[] = "GUADELOUPE	|Euro	|EUR|	978|";
        $cwArr[] = "GUAM	|US Dollar|	USD	|840";
        $cwArr[] = "GUATEMALA|	Quetzal	|GTQ|	320";
        $cwArr[] = "GUERNSEY|	Pound Sterling|	GBP|	826";
        $cwArr[] = "GUINEA	|Guinea Franc|	GNF	|324";
        $cwArr[] = "GUINEA-BISSAU	|CFA Franc BCEAO|	XOF	|952";
        $cwArr[] = "GUYANA	|Guyana Dollar	|GYD|	328";
        $cwArr[] = "HAITI	|Gourde	|HTG|	332";
        $cwArr[] = "HAITI|	US Dollar|	USD	|840";
        $cwArr[] = "HEARD ISLAND AND McDONALD ISLANDS|	Australian Dollar|	AUD|	036";
        $cwArr[] = "HOLY SEE (THE)	|Euro	|EUR|	978";
        $cwArr[] = "HONDURAS	|Lempira	|HNL	|340";
        $cwArr[] = "HONG KONG	|Hong Kong Dollar|	HKD	|344";
        $cwArr[] = "HUNGARY|	Forint|	HUF	|348";
        $cwArr[] = "ICELAND	|Iceland Krona	|ISK	|352";
        $cwArr[] = "INDIA	|Indian Rupee|	INR	|356";
        $cwArr[] = "INDONESIA|	Rupiah	|IDR|360";
        $cwArr[] = "INTERNATIONAL MONETARY FUND (IMF)| 	SDR (Special Drawing Right)|	XDR|	960";
        $cwArr[] = "IRAN (ISLAMIC REPUBLIC OF)|	Iranian Rial|	IRR	|364";
        $cwArr[] = "IRAQ	|Iraqi Dinar	|IQD	|368";
        $cwArr[] = "IRELAND	|Euro	|EUR|	978";
        $cwArr[] = "ISLE OF MAN|	Pound Sterling|	GBP|	826";
        $cwArr[] = "ISRAEL	New| Israeli Sheqel|	ILS	|376";
        $cwArr[] = "ITALY	|Euro|	EUR	|978";
        $cwArr[] = "JAMAICA	|Jamaican Dollar	|JMD	|388";
        $cwArr[] = "JAPAN	|Yen	|JPY	|392";
        $cwArr[] = "JERSEY	|Pound Sterling|	GBP|	826";
        $cwArr[] = "JORDAN	|Jordanian Dinar	|JOD|	400";
        $cwArr[] = "KAZAKHSTAN	|Tenge|	KZT|	398";
        $cwArr[] = "KENYA	|Kenyan Shilling	|KES	|404";
        $cwArr[] = "KIRIBATI|	Australian Dollar|	AUD	|036";
        $cwArr[] = "KOREA (THE DEMOCRATIC PEOPLE’S REPUBLIC OF)	|North Korean Won	|KPW	|408";
        $cwArr[] = "KOREA (THE REPUBLIC OF)	|Won|	KRW	|410";
        $cwArr[] = "KUWAIT|	Kuwaiti Dinar	|KWD|	414";
        $cwArr[] = "KYRGYZSTAN|	Som	|KGS	|417";
        $cwArr[] = "LAO PEOPLE’S DEMOCRATIC REPUBLIC (THE)|	Kip	|LAK	|418";
        $cwArr[] = "LATVIA|	Euro|	EUR	|978";
        $cwArr[] = "LEBANON|	Lebanese Pound	|LBP|	422";
        $cwArr[] = "LESOTHO|	Loti	|LSL|	426";
        $cwArr[] = "LESOTHO	|Rand|	ZAR	|710";
        $cwArr[] = "LIBERIA|	Liberian Dollar|	LRD|	430";
        $cwArr[] = "LIBYA	|Libyan Dinar|	LYD	|434";
        $cwArr[] = "LIECHTENSTEIN	|Swiss Franc	|CHF	|756";
        $cwArr[] = "LITHUANIA	|Euro|	EUR	|978";
        $cwArr[] = "LUXEMBOURG|	Euro|	EUR|	978";
        $cwArr[] = "MACAO	|Pataca|	MOP|446";
        $cwArr[] = "MACEDONIA (THE FORMER YUGOSLAV REPUBLIC OF)|	Denar|	MKD	|807";
        $cwArr[] = "MADAGASCAR	|Malagasy Ariary|	MGA	|969";
        $cwArr[] = "MALAWI|	Kwacha	|MWK|	454";
        $cwArr[] = "MALAYSIA	|Malaysian Ringgit|	MYR	|458";
        $cwArr[] = "MALDIVES|	Rufiyaa	|MVR	|462";
        $cwArr[] = "MALI	|CFA Franc BCEAO	|XOF	|952";
        $cwArr[] = "MALTA	|Euro	|EUR|	978";
        $cwArr[] = "MARSHALL ISLANDS (THE)	|US Dollar|	USD	|840";
        $cwArr[] = "MARTINIQUE|	Euro|	EUR	|978";
        $cwArr[] = "MAURITANIA|	Ouguiya|	MRU	|929";
        $cwArr[] = "MAURITIUS|	Mauritius Rupee|	MUR|	480";
        $cwArr[] = "MAYOTTE	|Euro	|EUR	|978";
        $cwArr[] = "MEMBER COUNTRIES OF THE AFRICAN DEVELOPMENT BANK GROUP|	ADB Unit of Account|	XUA	|965";
        $cwArr[] = "MEXICO|	Mexican Peso	|MXN	|484";
        $cwArr[] = "MEXICO	|Mexican Unidad de Inversion (UDI)	|MXV	|979";
        $cwArr[] = "MICRONESIA (FEDERATED STATES OF)	|US Dollar|	USD	|840";
        $cwArr[] = "MOLDOVA (THE REPUBLIC OF)	|Moldovan Leu|	MDL|	498";
        $cwArr[] = "MONACO	|Euro	|EUR	|978";
        $cwArr[] = "MONGOLIA	|Tugrik	|MNT|	496";
        $cwArr[] = "MONTENEGRO|	Euro	|EUR	|978";
        $cwArr[] = "MONTSERRAT	|East Caribbean Dollar	|XCD|	951";
        $cwArr[] = "MOROCCO	|Moroccan Dirham	|MAD	|504";
        $cwArr[] = "MOZAMBIQUE	|Mozambique| Metical	|MZN	|943";
        $cwArr[] = "MYANMAR	|Kyat|	MMK	|104";
        $cwArr[] = "NAMIBIA|	Namibia Dollar|	NAD|	516";
        $cwArr[] = "NAMIBIA|	Rand	|ZAR	|710";
        $cwArr[] = "NAURU	|Australian Dollar|	AUD|	036";
        $cwArr[] = "NEPAL	|Nepalese Rupee|	NPR|	524";
        $cwArr[] = "NETHERLANDS (THE)	|Euro|	EUR|	978";
        $cwArr[] = "NEW CALEDONIA|	CFP Franc|	XPF|	953";
        $cwArr[] = "NEW ZEALAND|	New Zealand Dollar|	NZD	|554";
        $cwArr[] = "NICARAGUA	|Cordoba Oro	|NIO	|558";
        $cwArr[] = "NIGER (THE)	|CFA Franc| BCEAO	|XOF|	952";
        $cwArr[] = "NIGERIA|	Naira	|NGN	|566";
        $cwArr[] = "NIUE	|New Zealand Dollar	|NZD	|554";
        $cwArr[] = "NORFOLK |ISLAND	|Australian Dollar|	AUD|	036";
        $cwArr[] = "NORTHERN MARIANA ISLANDS (THE)|US Dollar|	USD	|840";
        $cwArr[] = "NORWAY|	Norwegian Krone|	NOK	|578";
        $cwArr[] = "OMAN	|Rial Omani|	OMR|	512";
        $cwArr[] = "PAKISTAN	|Pakistan Rupee|	PKR	|586";
        $cwArr[] = "PALAU	|US Dollar|	USD	|840";	
        $cwArr[] = "PANAMA	|Balboa|	PAB|	590";
        $cwArr[] = "PANAMA	|US Dollar	|USD|	840";
        $cwArr[] = "PAPUA NEW GUINEA|	Kina|	PGK	|598";
        $cwArr[] = "PARAGUAY	|Guarani	|PYG	|600";
        $cwArr[] = "PERU	|Nuevo Sol|	PEN|	604";
        $cwArr[] = "PHILIPPINES |(THE)	Philippine| Peso	|PHP|	608";
        $cwArr[] = "PITCAIRN	|New Zealand| Dollar	|NZD	|554";
        $cwArr[] = "POLAND	|Zloty	|PLN|	985";
        $cwArr[] = "PORTUGAL|	Euro|	EUR|	978";
        $cwArr[] = "PUERTO RICO	|US Dollar|	USD|	840";
        $cwArr[] = "QATAR	|Qatari Rial	|QAR|	634";
        $cwArr[] = "ROMANIA|	Romanian Leu	|RON	|946";
        $cwArr[] = "RUSSIAN| FEDERATION (THE)	Russian Ruble	|RUB	|643";
        $cwArr[] = "RWANDA	|Rwanda Franc	|RWF|	646";
        $cwArr[] = "RÉUNION	|Euro|	EUR	|978";
        $cwArr[] = "SAINT BARTHÉLEMY|	Euro|	EUR|	978";
        $cwArr[] = "SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA|	Saint Helena Pound|	SHP	|654";
        $cwArr[] = "SAINT KITTS AND NEVIS|	East Caribbean Dollar|	XCD|	951";
        $cwArr[] = "SAINT LUCIA	East Caribbean| Dollar|	XCD|	951";
        $cwArr[] = "SAINT MARTIN (FRENCH PART)|	Euro|EUR|	978";
        $cwArr[] = "SAINT PIERRE AND MIQUELON	|Euro|	EUR|978";
        $cwArr[] = "SAINT VINCENT AND THE GRENADINES|	East Caribbean Dollar|	XCD	|951";
        $cwArr[] = "SAMOA|	Tala|	WST	|882";
        $cwArr[] = "SAN MARINO	|Euro|	EUR|	978";
        $cwArr[] = "SAO TOME AND PRINCIPE	|Dobra|	STN	|930";
        $cwArr[] = "SAUDI ARABIA	|Saudi Riyal	|SAR|	682";
        $cwArr[] = "SENEGAL	|CFA Franc BCEAO	|XOF	|952";
        $cwArr[] = "SERBIA|	Serbian Dinar	|RSD|	941";
        $cwArr[] = "SEYCHELLES	|Seychelles Rupee	|SCR	|690";
        $cwArr[] = "SIERRA LEONE	|Leone|	SLL	|694";
        $cwArr[] = "SINGAPORE	|Singapore Dollar	|SGD|	702";
        $cwArr[] = "SINT MAARTEN (DUTCH PART)	|Netherlands Antillean Guilder	|ANG|	532";
        $cwArr[] = "SISTEMA UNITARIO DE COMPENSACION REGIONAL DE PAGOS 'SUCRE'	|Sucre	|XSU	|994";
        $cwArr[] = "SLOVAKIA	|Euro|	EUR|	978";
        $cwArr[] = "SLOVENIA|	Euro|	EUR|	978";
        $cwArr[] = "SOLOMON ISLANDS	|Solomon Islands Dollar	|SBD	|090";
        $cwArr[] = "SOMALIA	|Somali Shilling|	SOS	|706";
        $cwArr[] = "SOUTH AFRICA|	Rand	|ZAR	|710";		
        $cwArr[] = "SOUTH SUDAN	|South Sudanese Pound	|SSP|	728";
        $cwArr[] = "SPAIN|	Euro	|EUR|	978";
        $cwArr[] = "SRI LANKA	|Sri Lanka Rupee	|LKR|	144";
        $cwArr[] = "SUDAN (THE)|	Sudanese Pound	|SDG	|938";
        $cwArr[] = "SURINAME	|Surinam Dollar|	SRD|	968";
        $cwArr[] = "SVALBARD AND JAN MAYEN|	Norwegian Krone|	NOK	|578";
        $cwArr[] = "SWAZILAND	|Lilangeni	|SZL	|748";
        $cwArr[] = "SWEDEN	|Swedish Krona	|SEK|	752";
        $cwArr[] = "SWITZERLAND	|WIR Euro	|CHE|	947";
        $cwArr[] = "SWITZERLAND|	Swiss Franc|	CHF|	756";
        $cwArr[] = "SWITZERLAND|	WIR Franc	|CHW|	948";
        $cwArr[] = "SYRIAN ARAB REPUBLIC	|Syrian Pound	|SYP|	760";
        $cwArr[] = "TAIWAN (PROVINCE OF CHINA)|	New Taiwan Dollar|	TWD	|901";
        $cwArr[] = "TAJIKISTAN|	Somoni	|TJS|	972";
        $cwArr[] = "TANZANIA| UNITED REPUBLIC OF	Tanzanian Shilling	|TZS	|834";
        $cwArr[] = "THAILAND|	Baht	|THB	|764";
        $cwArr[] = "TIMOR-LESTE	|US Dollar	|USD	|840";
        $cwArr[] = "TOGO	|CFA Franc BCEAO|	XOF|	952";
        $cwArr[] = "TOKELAU|	New Zealand |Dollar|	NZD|	554";
        $cwArr[] = "TONGA	|Pa’anga|	TOP	|776";
        $cwArr[] = "TRINIDAD AND TOBAGO	|Trinidad and Tobago Dollar|	TTD|	780";
        $cwArr[] = "TUNISIA|	Tunisian Dinar|	TND	|788";
        $cwArr[] = "TURKEY|	Turkish Lira	|TRY	|949";
        $cwArr[] = "TURKMENISTAN|	Turkmenistan New Manat	|TMT|	934";
        $cwArr[] = "TURKS AND CAICOS ISLANDS (THE)|	US Dollar	|USD|	840";
        $cwArr[] = "TUVALU	|Australian Dollar|	AUD	|036";
        $cwArr[] = "UGANDA	|Uganda Shilling|	UGX	|800";
        $cwArr[] = "UKRAINE|	Hryvnia	|UAH	|980";
        $cwArr[] = "UNITED ARAB EMIRATES (THE)|	UAE Dirham|	AED|	784";
        $cwArr[] = "UNITED KINGDOM OF GREAT BRITAIN AND NORTHERN IRELAND (THE)|	Pound Sterling|	GBP|	826";
        $cwArr[] = "UNITED STATES MINOR OUTLYING ISLANDS (THE)	|US Dollar	|USD|	840";
        $cwArr[] = "UNITED STATES OF AMERICA (THE)|	US Dollar	|USD	|840";
        $cwArr[] = "UNITED STATES OF AMERICA (THE)|US Dollar (Next day)	|USN|	997";
        $cwArr[] = "URUGUAY	Uruguay |Peso en Unidades Indexadas (URUIURUI)	|UYI|	940";
        $cwArr[] = "URUGUAY|	Peso Uruguayo	|UYU	|858";
        $cwArr[] = "UZBEKISTAN	|Uzbekistan Sum	|UZS	|860";
        $cwArr[] = "VANUATU|	Vatu|	VUV	|548";
        $cwArr[] = "VENEZUELA (BOLIVARIAN REPUBLIC OF)|	Bolivar|	VEF|	937";
        $cwArr[] = "VIET NAM|	Dong|	VND|	704";
        $cwArr[] = "VIRGIN ISLANDS (BRITISH)|	US Dollar	|USD	|840";
        $cwArr[] = "VIRGIN ISLANDS (U.S.)	|US Dollar	|USD	|840";
        $cwArr[] = "WALLIS AND FUTUNA	|CFP Franc	|XPF	|953";
        $cwArr[] = "WESTERN SAHARA|	Moroccan Dirham|	MAD|	504";
        $cwArr[] = "YEMEN	|Yemeni Rial	|YER|	886";
        $cwArr[] = "ZAMBIA	|Zambian Kwacha|	ZMW	|967";
        $cwArr[] = "ZIMBABWE	|Zimbabwe |Dollar|	ZWL|	932";
        $cwArr[] = "ÅLAND ISLANDS	|Euro	|EUR	|978";
        
        foreach ( $cwArr as $k=>$cw )
        {
            $cw = trim($cw);
            $sc = explode( "|", $cw );
            if( COUNT( $sc ) >3 )
            {
                $data['country_id'] = (int)getField( "country_id" , "country", "country_key", strtoupper( trim( $sc[0] ) ) );
                if( !empty( $data['country_id'] ) )
                {
                    $data['currency_symbol'] = 0;
                    $data['currency_value'] = 0;
                    $data['currency_name'] = trim( $sc[1] );
                    $data['currency_code'] = trim( $sc[2] );
                    $data['currency_symbol'] = trim( $sc[2] );
                    $data['currency_status'] = 1;
                    $this->db->insert( "currency", $data );
                }
                else 
                {
                    echo $k.": ".$sc[0]." -> ".$sc[1]." -> ".$sc[2]."<br>";
                }
            }
            else 
            {
                echo $cw."<br>";
            }
        }
    }
    
    function insertCountryTable()
    {
        $countryArr = array();
        $countryArr[] = array(1, 'AF', 'Afghanistan', 93);
        $countryArr[] = array(2, 'AL', 'Albania', 355);
        $countryArr[] = array(3, 'DZ', 'Algeria', 213);
        $countryArr[] = array(4, 'AS', 'American Samoa', 1684);
        $countryArr[] = array(5, 'AD', 'Andorra', 376);
        $countryArr[] = array(6, 'AO', 'Angola', 244);
        $countryArr[] = array(7, 'AI', 'Anguilla', 1264);
        $countryArr[] = array(8, 'AQ', 'Antarctica', 0);
        $countryArr[] = array(9, 'AG', 'Antigua And Barbuda', 1268);
        $countryArr[] = array(10, 'AR', 'Argentina', 54);
        $countryArr[] = array(11, 'AM', 'Armenia', 374);
        $countryArr[] = array(12, 'AW', 'Aruba', 297);
        $countryArr[] = array(13, 'AU', 'Australia', 61);
        $countryArr[] = array(14, 'AT', 'Austria', 43);
        $countryArr[] = array(15, 'AZ', 'Azerbaijan', 994);
        $countryArr[] = array(16, 'BS', 'Bahamas The', 1242);
        $countryArr[] = array(17, 'BH', 'Bahrain', 973);
        $countryArr[] = array(18, 'BD', 'Bangladesh', 880);
        $countryArr[] = array(19, 'BB', 'Barbados', 1246);
        $countryArr[] = array(20, 'BY', 'Belarus', 375);
        $countryArr[] = array(21, 'BE', 'Belgium', 32);
        $countryArr[] = array(22, 'BZ', 'Belize', 501);
        $countryArr[] = array(23, 'BJ', 'Benin', 229);
        $countryArr[] = array(24, 'BM', 'Bermuda', 1441);
        $countryArr[] = array(25, 'BT', 'Bhutan', 975);
        $countryArr[] = array(26, 'BO', 'Bolivia', 591);
        $countryArr[] = array(27, 'BA', 'Bosnia and Herzegovina', 387);
        $countryArr[] = array(28, 'BW', 'Botswana', 267);
        $countryArr[] = array(29, 'BV', 'Bouvet Island', 0);
        $countryArr[] = array(30, 'BR', 'Brazil', 55);
        $countryArr[] = array(31, 'IO', 'British Indian Ocean Territory', 246);
        $countryArr[] = array(32, 'BN', 'Brunei', 673);
        $countryArr[] = array(33, 'BG', 'Bulgaria', 359);
        $countryArr[] = array(34, 'BF', 'Burkina Faso', 226);
        $countryArr[] = array(35, 'BI', 'Burundi', 257);
        $countryArr[] = array(36, 'KH', 'Cambodia', 855);
        $countryArr[] = array(37, 'CM', 'Cameroon', 237);
        $countryArr[] = array(38, 'CA', 'Canada', 1);
        $countryArr[] = array(39, 'CV', 'Cape Verde', 238);
        $countryArr[] = array(40, 'KY', 'Cayman Islands', 1345);
        $countryArr[] = array(41, 'CF', 'Central African Republic', 236);
        $countryArr[] = array(42, 'TD', 'Chad', 235);
        $countryArr[] = array(43, 'CL', 'Chile', 56);
        $countryArr[] = array(44, 'CN', 'China', 86);
        $countryArr[] = array(45, 'CX', 'Christmas Island', 61);
        $countryArr[] = array(46, 'CC', 'Cocos (Keeling) Islands', 672);
        $countryArr[] = array(47, 'CO', 'Colombia', 57);
        $countryArr[] = array(48, 'KM', 'Comoros', 269);
        $countryArr[] = array(49, 'CG', 'Republic Of The Congo', 242);
        $countryArr[] = array(50, 'CD', 'Democratic Republic Of The Congo', 242);
        $countryArr[] = array(51, 'CK', 'Cook Islands', 682);
        $countryArr[] = array(52, 'CR', 'Costa Rica', 506);
        $countryArr[] = array(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225);
        $countryArr[] = array(54, 'HR', 'Croatia (Hrvatska)', 385);
        $countryArr[] = array(55, 'CU', 'Cuba', 53);
        $countryArr[] = array(56, 'CY', 'Cyprus', 357);
        $countryArr[] = array(57, 'CZ', 'Czech Republic', 420);
        $countryArr[] = array(58, 'DK', 'Denmark', 45);
        $countryArr[] = array(59, 'DJ', 'Djibouti', 253);
        $countryArr[] = array(60, 'DM', 'Dominica', 1767);
        $countryArr[] = array(61, 'DO', 'Dominican Republic', 1809);
        $countryArr[] = array(62, 'TP', 'East Timor', 670);
        $countryArr[] = array(63, 'EC', 'Ecuador', 593);
        $countryArr[] = array(64, 'EG', 'Egypt', 20);
        $countryArr[] = array(65, 'SV', 'El Salvador', 503);
        $countryArr[] = array(66, 'GQ', 'Equatorial Guinea', 240);
        $countryArr[] = array(67, 'ER', 'Eritrea', 291);
        $countryArr[] = array(68, 'EE', 'Estonia', 372);
        $countryArr[] = array(69, 'ET', 'Ethiopia', 251);
        $countryArr[] = array(70, 'XA', 'External Territories of Australia', 61);
        $countryArr[] = array(71, 'FK', 'Falkland Islands', 500);
        $countryArr[] = array(72, 'FO', 'Faroe Islands', 298);
        $countryArr[] = array(73, 'FJ', 'Fiji Islands', 679);
        $countryArr[] = array(74, 'FI', 'Finland', 358);
        $countryArr[] = array(75, 'FR', 'France', 33);
        $countryArr[] = array(76, 'GF', 'French Guiana', 594);
        $countryArr[] = array(77, 'PF', 'French Polynesia', 689);
        $countryArr[] = array(78, 'TF', 'French Southern Territories', 0);
        $countryArr[] = array(79, 'GA', 'Gabon', 241);
        $countryArr[] = array(80, 'GM', 'Gambia The', 220);
        $countryArr[] = array(81, 'GE', 'Georgia', 995);
        $countryArr[] = array(82, 'DE', 'Germany', 49);
        $countryArr[] = array(83, 'GH', 'Ghana', 233);
        $countryArr[] = array(84, 'GI', 'Gibraltar', 350);
        $countryArr[] = array(85, 'GR', 'Greece', 30);
        $countryArr[] = array(86, 'GL', 'Greenland', 299);
        $countryArr[] = array(87, 'GD', 'Grenada', 1473);
        $countryArr[] = array(88, 'GP', 'Guadeloupe', 590);
        $countryArr[] = array(89, 'GU', 'Guam', 1671);
        $countryArr[] = array(90, 'GT', 'Guatemala', 502);
        $countryArr[] = array(91, 'XU', 'Guernsey and Alderney', 44);
        $countryArr[] = array(92, 'GN', 'Guinea', 224);
        $countryArr[] = array(93, 'GW', 'Guinea-Bissau', 245);
        $countryArr[] = array(94, 'GY', 'Guyana', 592);
        $countryArr[] = array(95, 'HT', 'Haiti', 509);
        $countryArr[] = array(96, 'HM', 'Heard and McDonald Islands', 0);
        $countryArr[] = array(97, 'HN', 'Honduras', 504);
        $countryArr[] = array(98, 'HK', 'Hong Kong S.A.R.', 852);
        $countryArr[] = array(99, 'HU', 'Hungary', 36);
        $countryArr[] = array(100, 'IS', 'Iceland', 354);
        $countryArr[] = array(101, 'IN', 'India', 91);
        $countryArr[] = array(102, 'ID', 'Indonesia', 62);
        $countryArr[] = array(103, 'IR', 'Iran', 98);
        $countryArr[] = array(104, 'IQ', 'Iraq', 964);
        $countryArr[] = array(105, 'IE', 'Ireland', 353);
        $countryArr[] = array(106, 'IL', 'Israel', 972);
        $countryArr[] = array(107, 'IT', 'Italy', 39);
        $countryArr[] = array(108, 'JM', 'Jamaica', 1876);
        $countryArr[] = array(109, 'JP', 'Japan', 81);
        $countryArr[] = array(110, 'XJ', 'Jersey', 44);
        $countryArr[] = array(111, 'JO', 'Jordan', 962);
        $countryArr[] = array(112, 'KZ', 'Kazakhstan', 7);
        $countryArr[] = array(113, 'KE', 'Kenya', 254);
        $countryArr[] = array(114, 'KI', 'Kiribati', 686);
        $countryArr[] = array(115, 'KP', 'Korea North', 850);
        $countryArr[] = array(116, 'KR', 'Korea South', 82);
        $countryArr[] = array(117, 'KW', 'Kuwait', 965);
        $countryArr[] = array(118, 'KG', 'Kyrgyzstan', 996);
        $countryArr[] = array(119, 'LA', 'Laos', 856);
        $countryArr[] = array(120, 'LV', 'Latvia', 371);
        $countryArr[] = array(121, 'LB', 'Lebanon', 961);
        $countryArr[] = array(122, 'LS', 'Lesotho', 266);
        $countryArr[] = array(123, 'LR', 'Liberia', 231);
        $countryArr[] = array(124, 'LY', 'Libya', 218);
        $countryArr[] = array(125, 'LI', 'Liechtenstein', 423);
        $countryArr[] = array(126, 'LT', 'Lithuania', 370);
        $countryArr[] = array(127, 'LU', 'Luxembourg', 352);
        $countryArr[] = array(128, 'MO', 'Macau S.A.R.', 853);
        $countryArr[] = array(129, 'MK', 'Macedonia', 389);
        $countryArr[] = array(130, 'MG', 'Madagascar', 261);
        $countryArr[] = array(131, 'MW', 'Malawi', 265);
        $countryArr[] = array(132, 'MY', 'Malaysia', 60);
        $countryArr[] = array(133, 'MV', 'Maldives', 960);
        $countryArr[] = array(134, 'ML', 'Mali', 223);
        $countryArr[] = array(135, 'MT', 'Malta', 356);
        $countryArr[] = array(136, 'XM', 'Man (Isle of)', 44);
        $countryArr[] = array(137, 'MH', 'Marshall Islands', 692);
        $countryArr[] = array(138, 'MQ', 'Martinique', 596);
        $countryArr[] = array(139, 'MR', 'Mauritania', 222);
        $countryArr[] = array(140, 'MU', 'Mauritius', 230);
        $countryArr[] = array(141, 'YT', 'Mayotte', 269);
        $countryArr[] = array(142, 'MX', 'Mexico', 52);
        $countryArr[] = array(143, 'FM', 'Micronesia', 691);
        $countryArr[] = array(144, 'MD', 'Moldova', 373);
        $countryArr[] = array(145, 'MC', 'Monaco', 377);
        $countryArr[] = array(146, 'MN', 'Mongolia', 976);
        $countryArr[] = array(147, 'MS', 'Montserrat', 1664);
        $countryArr[] = array(148, 'MA', 'Morocco', 212);
        $countryArr[] = array(149, 'MZ', 'Mozambique', 258);
        $countryArr[] = array(150, 'MM', 'Myanmar', 95);
        $countryArr[] = array(151, 'NA', 'Namibia', 264);
        $countryArr[] = array(152, 'NR', 'Nauru', 674);
        $countryArr[] = array(153, 'NP', 'Nepal', 977);
        $countryArr[] = array(154, 'AN', 'Netherlands Antilles', 599);
        $countryArr[] = array(155, 'NL', 'Netherlands The', 31);
        $countryArr[] = array(156, 'NC', 'New Caledonia', 687);
        $countryArr[] = array(157, 'NZ', 'New Zealand', 64);
        $countryArr[] = array(158, 'NI', 'Nicaragua', 505);
        $countryArr[] = array(159, 'NE', 'Niger', 227);
        $countryArr[] = array(160, 'NG', 'Nigeria', 234);
        $countryArr[] = array(161, 'NU', 'Niue', 683);
        $countryArr[] = array(162, 'NF', 'Norfolk Island', 672);
        $countryArr[] = array(163, 'MP', 'Northern Mariana Islands', 1670);
        $countryArr[] = array(164, 'NO', 'Norway', 47);
        $countryArr[] = array(165, 'OM', 'Oman', 968);
        $countryArr[] = array(166, 'PK', 'Pakistan', 92);
        $countryArr[] = array(167, 'PW', 'Palau', 680);
        $countryArr[] = array(168, 'PS', 'Palestinian Territory Occupied', 970);
        $countryArr[] = array(169, 'PA', 'Panama', 507);
        $countryArr[] = array(170, 'PG', 'Papua new Guinea', 675);
        $countryArr[] = array(171, 'PY', 'Paraguay', 595);
        $countryArr[] = array(172, 'PE', 'Peru', 51);
        $countryArr[] = array(173, 'PH', 'Philippines', 63);
        $countryArr[] = array(174, 'PN', 'Pitcairn Island', 0);
        $countryArr[] = array(175, 'PL', 'Poland', 48);
        $countryArr[] = array(176, 'PT', 'Portugal', 351);
        $countryArr[] = array(177, 'PR', 'Puerto Rico', 1787);
        $countryArr[] = array(178, 'QA', 'Qatar', 974);
        $countryArr[] = array(179, 'RE', 'Reunion', 262);
        $countryArr[] = array(180, 'RO', 'Romania', 40);
        $countryArr[] = array(181, 'RU', 'Russia', 70);
        $countryArr[] = array(182, 'RW', 'Rwanda', 250);
        $countryArr[] = array(183, 'SH', 'Saint Helena', 290);
        $countryArr[] = array(184, 'KN', 'Saint Kitts And Nevis', 1869);
        $countryArr[] = array(185, 'LC', 'Saint Lucia', 1758);
        $countryArr[] = array(186, 'PM', 'Saint Pierre and Miquelon', 508);
        $countryArr[] = array(187, 'VC', 'Saint Vincent And The Grenadines', 1784);
        $countryArr[] = array(188, 'WS', 'Samoa', 684);
        $countryArr[] = array(189, 'SM', 'San Marino', 378);
        $countryArr[] = array(190, 'ST', 'Sao Tome and Principe', 239);
        $countryArr[] = array(191, 'SA', 'Saudi Arabia', 966);
        $countryArr[] = array(192, 'SN', 'Senegal', 221);
        $countryArr[] = array(193, 'RS', 'Serbia', 381);
        $countryArr[] = array(194, 'SC', 'Seychelles', 248);
        $countryArr[] = array(195, 'SL', 'Sierra Leone', 232);
        $countryArr[] = array(196, 'SG', 'Singapore', 65);
        $countryArr[] = array(197, 'SK', 'Slovakia', 421);
        $countryArr[] = array(198, 'SI', 'Slovenia', 386);
        $countryArr[] = array(199, 'XG', 'Smaller Territories of the UK', 44);
        $countryArr[] = array(200, 'SB', 'Solomon Islands', 677);
        $countryArr[] = array(201, 'SO', 'Somalia', 252);
        $countryArr[] = array(202, 'ZA', 'South Africa', 27);
        $countryArr[] = array(203, 'GS', 'South Georgia', 0);
        $countryArr[] = array(204, 'SS', 'South Sudan', 211);
        $countryArr[] = array(205, 'ES', 'Spain', 34);
        $countryArr[] = array(206, 'LK', 'Sri Lanka', 94);
        $countryArr[] = array(207, 'SD', 'Sudan', 249);
        $countryArr[] = array(208, 'SR', 'Suriname', 597);
        $countryArr[] = array(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47);
        $countryArr[] = array(210, 'SZ', 'Swaziland', 268);
        $countryArr[] = array(211, 'SE', 'Sweden', 46);
        $countryArr[] = array(212, 'CH', 'Switzerland', 41);
        $countryArr[] = array(213, 'SY', 'Syria', 963);
        $countryArr[] = array(214, 'TW', 'Taiwan', 886);
        $countryArr[] = array(215, 'TJ', 'Tajikistan', 992);
        $countryArr[] = array(216, 'TZ', 'Tanzania', 255);
        $countryArr[] = array(217, 'TH', 'Thailand', 66);
        $countryArr[] = array(218, 'TG', 'Togo', 228);
        $countryArr[] = array(219, 'TK', 'Tokelau', 690);
        $countryArr[] = array(220, 'TO', 'Tonga', 676);
        $countryArr[] = array(221, 'TT', 'Trinidad And Tobago', 1868);
        $countryArr[] = array(222, 'TN', 'Tunisia', 216);
        $countryArr[] = array(223, 'TR', 'Turkey', 90);
        $countryArr[] = array(224, 'TM', 'Turkmenistan', 7370);
        $countryArr[] = array(225, 'TC', 'Turks And Caicos Islands', 1649);
        $countryArr[] = array(226, 'TV', 'Tuvalu', 688);
        $countryArr[] = array(227, 'UG', 'Uganda', 256);
        $countryArr[] = array(228, 'UA', 'Ukraine', 380);
        $countryArr[] = array(229, 'AE', 'United Arab Emirates', 971);
        $countryArr[] = array(230, 'GB', 'United Kingdom', 44);
        $countryArr[] = array(231, 'US', 'United States', 1);
        $countryArr[] = array(232, 'UM', 'United States Minor Outlying Islands', 1);
        $countryArr[] = array(233, 'UY', 'Uruguay', 598);
        $countryArr[] = array(234, 'UZ', 'Uzbekistan', 998);
        $countryArr[] = array(235, 'VU', 'Vanuatu', 678);
        $countryArr[] = array(236, 'VA', 'Vatican City State (Holy See)', 39);
        $countryArr[] = array(237, 'VE', 'Venezuela', 58);
        $countryArr[] = array(238, 'VN', 'Vietnam', 84);
        $countryArr[] = array(239, 'VG', 'Virgin Islands (British)', 1284);
        $countryArr[] = array(240, 'VI', 'Virgin Islands (US)', 1340);
        $countryArr[] = array(241, 'WF', 'Wallis And Futuna Islands', 681);
        $countryArr[] = array(242, 'EH', 'Western Sahara', 212);
        $countryArr[] = array(243, 'YE', 'Yemen', 967);
        $countryArr[] = array(244, 'YU', 'Yugoslavia', 38);
        $countryArr[] = array(245, 'ZM', 'Zambia', 260);
        $countryArr[] = array(246, 'ZW', 'Zimbabwe', 263);
        
        foreach ( $countryArr as $country )
        {
            $data = array();
            $data['country_id'] = $country[0];
            $data['country_name'] = $country[2];
            $data['country_key'] = strtoupper( $country[2] );
            $data['country_code'] = $country[3];
            $data['country_2_char_code'] = $country[1];
            $data['country_status'] = 1;
            
//             $this->db->where( "country_key", strtoupper( $country[2] ) )->update( "country", $data );
            $this->db->insert( "country", $data );
        }
    }
    
    function insertStateTable()
    {
        $fileId = ( $_GET['id'] ) ? $_GET['id'] : 0 ;
        
        if( !empty( $fileId ) )
        {
            $handle = fopen( base_url( "assets/text-files/All-State-List-".$fileId.".txt" ), "r" );
            
            if ($handle)
            {
                $c=1;
                while (($line = fgets($handle)) !== false)
                {
                    // process the line read.
                    $state = explode( "|", $line );
                    
                    $data = array();
                    $data['state_id'] = str_replace( "(", "", $state[0] );
                    $data['state_name'] = trim( $state[1] );
                    $data['state_key'] = trim( strtoupper( $state[1] ) );
                    $data['country_id'] = trim( $state[2] );
                    $data['state_status'] = 1;
                    
                    $this->db->insert( "state", $data );
                    echo $c." : ".$this->db->last_query()."<br>";
                    $c++;
                }
                
                fclose($handle);
            }
            else
            {
                // error opening the file.
                echo "Something want wrong!!!";
            }
        }
        else
        {
            echo "Please Select File Name";
        }
    }
    
    function insertCityTable()
    {
        $fileId = ( $_GET['id'] ) ? $_GET['id'] : 0 ;
        
        if( !empty( $fileId ) )
        {
            $handle = fopen( base_url( "assets/text-files/All-Cities-".$fileId.".txt" ), "r" );
            
            if ($handle)
            {
                $c=1;
                while (($line = fgets($handle)) !== false)
                {
                    // process the line read.
                    $city = explode( "|", $line );
                    $data = array();
                    $data['city_id'] = str_replace( "(", "", $city[0] );
                    $data['city_name'] = trim( $city[1] );
                    $data['city_key'] = trim( strtoupper( $city[1] ) );
                    $data['state_id'] = trim( $city[2] );
                    $data['city_status'] = 1;

                    $this->db->insert( "city", $data );
                    echo $c." : ".$this->db->last_query()."<br>";
                    $c++;
                }
                
                fclose($handle);
            }
            else
            {
                // error opening the file.
                echo "Something want wrong!!!";
            }
        }
        else
        {
            echo "Please Select File Name";
        }
    }
    
    function updateCityKey()
    {
        $start = (int)$this->input->get('start');
        $end = $start + 100;
        
        $resArr = executeQuery( "SELECT currency_id, currency_name FROM currency LIMIT ".$start.", ".$end );
        
        if( !empty( $resArr ) )
        {
            foreach ( $resArr as $res )
            {
                $data['currency_key'] = strtoupper( $res['currency_name'] );
                
                $this->db->where( 'currency_id', $res['currency_id'] )->update( "currency", $data );
            }
            
            $url = "'http://127.0.0.1/gst_billing/cron/updateCityKey?start=".$end."'";
            echo '<script type="text/javascript">
				setTimeout( function()
							{ location.href = '.$url.'; }, 3000 );
			  </script>';
        }
        else
        {
            echo "Complete";
        }
    }
    
    function compress() 
    {
//         $start = $_GET['start'];
//         $end = $start+50;
//         for( $i=$start;$i<=$end;$i++ )
//         {
//             $source = 'assets/gm/origional/content-'.$i.'.jpg';
//             if( isset( $source ) )
//             {
//                 $destination = 'assets/gm/compress/content-'.$i.'.jpg';
//                 $this->compressImage( "image/jpeg", $source, $destination, 100);
//             }
//         }

            $source = 'assets/gm/origional/logo.png';
            $destination = 'assets/gm/compress/logo.png';
            $this->compressImage( "image/png", $source, $destination, 50);

//         $url = "'http://127.0.0.1/gst_billing/cron/compress?start=".$end."'";
//         echo '<script type="text/javascript">
// 				setTimeout( function()
// 							{ location.href = '.$url.'; }, 3000 );
// 			  </script>';
    }
    
    // Compress image
    function compressImage( $type, $source, $destination, $quality) 
    {
        if ($type == 'image/jpeg')
            $image = imagecreatefromjpeg($source);
        else if ($type == 'image/png')
            $image = imagecreatefrompng($source);
            
        imagejpeg($image, $destination, $quality);
        
    }
    
    function sendMail()
    {
        sendMail( "kakdiya.gautam288@gmail.com", "This is testing mail", "Success");
    }
    
    function insertPostcode()
    {
        $postCodeArr = array( "INP/RP6|AAL-SEZ/Visakhapatnam",
            "INAPI6|AAP-SEZ/AHMEDABAD",
            "INCJA6|AEIP SEZ / KANCHEEPURAM",
            "INALA1|ALANG SBY",
            "INNNN6|AMRL International Tech City Ltd.-",
            "IN BUL 6|AN FTWZ LTD - FTWZ/ BULANDSHAHR",
            "INMEA 6|APIIC-SEZ/Vill-Lalgadi Distt.-Ranga",
            "IN CDP 6|APIIC/SEZ/Cuddapah",
            "INMDE6|APIICL SEZ/MEDAK",
            "INAKP6|APIICL SEZ/Visakhapatnam",
            "INGLY6|APIICL-SEZ/MAHABOOBNAGAR",
            "INFMA6|APIICL/Medak District",
            "INGNA6|APPL SEZ/Gandhinagar",
            "INPNV6|ARSHIYA-SEZ/PANVEL",
            "INSPE6|ASDIPL-SEZ/NELLORE",
            "INACH1|Achra",
            "INADA6|Adalaj",
            "INAGTB|Agartala",
            "INAGI1|Agatti Island",
            "INAGR4|Agra",
            "INBU6|Agra",
            "INAMD4|Ahmedabad",
            "INABG1|Alibag",
            "INALF1|Allepey",
            "INAMD5|Amhedabad",
            "INAMG6|Amingaon(Gauhati)",
            "INAMI1|Amini IsTand",
            "INASR6|Amritsar",
            "INASR2|Amritsar Railway Station",
            "INAPT6|Anaparthi",
            "INADI1|Androth Island",
            "INANG1|Anijengo",
            "INAKV6|Ankleshwar",
            "INAJJ6|Arakkonam - Melpakkam - Chennai",
            "INANL1|Arnala",
            "INARR6|Aroor",
            "INATT2|Attari Railway Station",
            "INDMRS|Demagir",
            "INDEG1|Deogad",
            "INDHLB|Dhalaighat",
            "INDSK1|Dhanu - Shkodi",
            "INDMT1|Dharamtar",
            "INDLAB|Dharchula",
            "INDHR1|Dholera",
            "INDHBB|Dhubri Steamerghat",
            "INDIG1|Dighi Port",
            "INDIG6|Dighi(Pune)",
            "IN VLD 6|Dishman-Pharmaceutical-",
            "INDIV1|Div",
            "INDRK1|Dwarka (Rupen)",
            "INJBL6|E-Complex SEZ / Amreli",
            "INCEC6|ECTN SEZ / COIMBATORE",
            "INCJE6|ECTN SEZ / KANCHEEPURAM",
			"INMEC6|ECTN SEZ / MADURAI - I",
			"INMDC6|ECTN SEZ / MADURAI - II",
			"INSXE6|ECTN SEZ / SALEM",
			"INMAE6|ECTNL SEZ / Gangaikondan",
			"INPEK6|EON KHARADI INFRASTRUCTURE",
			"INCGE6|ETA SEZ / KANCHEEPURAM",
			"INUKL6|ETLISL-SEZ/Erode",
			"INESH1|Elphinstone Harbour",
			"INENR1|Ennore",
			"INBC06|Euro Multivision Bhachau SEZ / Kutch",
			"INURF 6|FAB CITY SPV Distt. Ranga Reddy",
			"INCF16|FIPL SEZ / KANCHEEPURAM",
			"INGDP6|FLLPL-SEZ/Thirruvallur",
			"INCJF6|FTIL-SEZ Sriperumbudur",
			"INFLT6|Falta (EPZ/SEZ)",
			"INFBD6|Faridabad",
			"INFBRB|Fulbari",
			"INAIG6|GEPL SEZ/Thane",
			"INUDN6|GHB-SEZ/SURAT",
			"INGNG6|GIDC-SEZ/GANDHINAGAR",
			"INGNC6|GIFT SEZ/Gandhinagar",
			"INKNU4|Kanpur",
			"INKNU6|Kanpur - JRY (IC0)",
			"INICAP6|Kapadra(Surat)",
			"INKRK1|Karaikal",
			"INKRN1|Karanja",
			"INKDD6|Karedu",
			"INKXJ2|Karimganj Railway Station",
			"INKGJB|Karimganj Steamerghat and Ferry",
			"INCCJ4|Karipur(Calicut)",
			"INKRW1|Karwar(including Sardeshivagad)",
			"INKSG1|Kasargod",
			"INKTGB|Katarniyaghat",
			"INKTRB|Kathihar",
			"INKVT1|Kavaratti Island",
			"INKVI1|Kavi",
			"INKELB|Kel Sahar Subdivision",
			"INKSH1|Kelshi",
			"INKIW1|Kelwa",
			"INKHD6|Kheda -Dhar ICD",
			"INKHP6|Khopta (EPZ/SEZ)",
			"INKWGB|Khowaighat",
			"INKWAB|Khunwa",
			"INKKR1|Kilakari",
			"INKTI1|Kiltan Island",
			"INKRP1|Kiranpani",
			"INKDN1|Kodinar(Muldwarka)",
			"INKOK1|Koka",
			"INCCU4|Kolkata Air Cargo",
			"INBNK6|Kolkata IT Park/Bantala",
			"INCCU1|Kolkata Sea",
			"INKDP1|Kondiapetnam",
			"INKTT6|Kota",
			"INRDT6|Kota-Ravtha Road",
			"INMHDB|Kotawalighat (Mohedipur)",
			"INKTD1|Kotda",
			"INKTW1|Koteshwar",
			"INICYM6|Kottayam (10.11.09)",
			"INOKHC|Okha",
			"INOMU1|Old Mundra",
			"INRGBB|Old Raghna Bazar",
			"INONJ1|Onjal",
			"INBDM6|PANCHI GUJARAN, Sonepat lCD",
			"INDPC4|PCCCC, Bandra- Kuria Complex,",
			"INCOP6|PICPL-SEZ/KAKINADA",
			"INPDD1|Padubidri Minor Port",
			"INMBD6|Pakwara (Moradabad)",
			"INPSH1|Palshet",
			"INPMB1|Pamban",
			"INPNTB|Pan itanki (Naxabari)",
			"INPAN1|Panaji Port",
			"INPNJ1|Panjim",
			"INPVL6|Panvel",
			"INPRT1|Paradeep",
			"INPTL6|Patli ICD",
			"INPAT4|Patna",
			"INPPG6|Patparganj",
			"INPTP8|Patrapole",
			"INPPJ1|Pellet Plant Jetty at Shiroda",
			"INPTPB|Petrapole Road",
			"INPHBB|Phulbari",
			"INPMP6|Pimpri",
			"INPIN1|Pindhara",
			"INPAV1|Pipavav(Victor)Port",
			"ININD6|Pithampur",
			"IN BFR 6|Piyala/Ballabhgarh ICD",
			"INPNY1|Pondicherry",
			"INPNY6|Pondicherry ICD",
			"INPNN1|Ponnani",
			"INPBD1|Porbandar",
			"INIXZ1|Port Blair",
			"INIXZ4|Port Blair",
			"INPTN1|Portonovo",
			"INPNQ4|Pune",
			"INTH061 Tiruppur - Thottiplayam ICD",
			"INTUP6|Tirupur",
			"INTRL6|Tiruvallur ICD",
			"INTND1|Tondi",
			"INTRV4|Trivendrun Air Cargo",
			"INTMP1|Trombay",
			"INTDE6|Tudiyalur - Coimbatore ICD",
			"INTKD6|Tughlakabad",
			"INTUN1|Tuna",
			"INTNGB|Tungi",
			"INTUT6|Tuticorin ICD",
			"INTUT1|Tuticorin Sea",
			"INBNX6|UNITECH SEZ/Kolkata",
			"INUDZ6|Udaipur",
			"INULPB|Ultapani",
			"INULW1|Ulwa",
			"INUMR1|Umarsadi",
			"INUMB1|Umbergoan",
			"INUTN1|Uttan",
			"INMOV6|VBTL-SEZ/Medak",
			"INCJV6|VTPL SEZ / KANCHEEPURAM",
			"INVRU1|Vadarevu",
			"INVAD1|Vadinar",
			"INCHN6|Vadodara - Chhani",
			"INVKM1|Valinokkam",
			"INERV6|Vallarpadom SEZ / Ernakulam",
			"INVAL6|Valvada ICD",
			"INVSI1|Vansi-Borsi",
			"INVP16|Vapi",
			"INBSB6|Varanasi",
			"INVNS4|Varanasi",
			"INVRD1|Varavda",
			"INVSV1|Varsava",
			"INVZJ1|Vazhinjam",
			"INVNG1|Vengurla",
			"INVEP1|Veppalodai",
			"INATRb|Attari Road",
			"INAZK1|Azhikkal",
			"INAKB6|BIACPL SEZ/Visakhapatnam",
			"INPNP6|Babarpur",
			"INBDG1|Badagara",
			"INIXB4|Bagdogra",
			"INBGMB|Baghmara",
			"INBBP1|Bahabal Pur",
			"INBDR1|Baindur",
			"INBGUB|Bairgania",
			"INBLTB|Balet",
			"INBSAB|Banbasa",
			"INBND1|Bandra",
			"INBLR5|Bangalore",
			"INWFD6|Bangalore",
			"INBLR4|Banglore Air Cargo",
			"INBK71|Bankot",
			"INBEK4|Bareilly",
			"INBBM6|Bad Brahma",
			"INBMR2|Barmer Railway Station",
			"INBRC6|Baroda",
			"INBRAB|Barsora",
			"INBSN1|Bassein",
			"INBED1|Bedi(Including Rozi-Jamnagar)",
			"INBLP1|Belapur",
			"INBKR1|Belekeri",
			"INBLK1|Belekeri",
			"INDRU6|Belgaum - Desur",
			"INBNYB|Berhni",
			"INBET1|Betul",
			"INBYT1|Beyt",
			"INBGK6|Bhagat ki Kothi - Jodhpur ICD",
			"INBGW1|Bhagwa",
			"INBTI6|Bhatinda",
			"INBTK1|Bhatkal",
			"INBHU1|Bhavanagar",
			"INBNP1|Bheemunipatnam",
			"INADG6|GIPL-SEZ/AHMEDABAD",
			"IN URG 6|GMR Hyderabad",
			"INGALB|Galgalia",
			"INGIN6|Gandhidham",
			"INGHR6|Garhi Harsaru - Gurgaon ICD",
			"INGAU4|Gauhati",
			"INGHWB|Gauhati Steamerghat",
			"INGAIB|Gauriphanta",
			"INGAY4|Gaya",
			"INGED2|Gede Railway Station",
			"INBAG6|Gem & Jewellery-SEZ/Ulwe(Distt.",
			"INGTZB|Getandah",
			"INGHPB|Ghasuapara",
			"INGHA1|Ghogha",
			"INGJXB|Ghojadanga",
			"INGTGB|Gitaldah road",
			"INMRM1|Goa Sea",
			"INGGA1|Gogha",
			"INGICB|Golakganj (LCS )",
			"INGKJ2|Golakganj Raiivtay Station",
			"INGPR1|Gopalpur",
			"INSJR6|Greater Noida-Surajpur",
			"INGJIB|Gunji",
			"IN HZA1|HAZIRA PORT/SURAT",
			"INTNI6|HIPL SEZ/Visakhapatnam",
			"INTBH6|HIRL SEZ / KANCHEEPURAM",
			"INVKH6|HNB SEZ/ MUMBAI",
			"INTBS6|HTL SEZ / Sireseri",
			"AIN PNQ 6|Hadapsar, SEZ, Pune",
			"INHAL1|Haldia",
			"INHLD2|Haldibari Railway Station",
			"INHGT1|Hangarkatta","INHRN1|Harnai",
			"INHAS6|Hassan (EPZ/SEZ)",
			"INHTSB|Hatisar",
			"INHZA6|Hazira SEZ / Surat",
			"INHLIB|Hilli Kovalam",
			"INKR11|Krishnapatnam",
			"INKSP1|Kulasekarapatnam",
			"INKMB1|Kumbharu",
			"INKNLB|Kunauli",
			"INNUR6|Kundli",
			"IN BRL 6|L and T ltd./SEZ/Vadodara",
			"IN GNR 6|LIPL-ICD/Marripalem, Guntur",
			"IN NO16|LONI-1 ICD Ghaziabad",
			"INTLT6|LTSL SEZ / TIRUVALLUR",
			"INLGLB|Lalgola Town",
			"INLTBB|Latu Bazar",
			"INLPR1|Leapuram",
			"INLK04|Lucknow",
			"INLUD6|Ludhiana",
			"INLDH6|Ludhiana",
			"INTMX6|M/s CONTINENTAL MULTIMODAL",
			"IN KBC6|M/s Kribhco Infrastructure Ltd.",
			"INRJN6|M/s LANCO SOLAR PRIVATE LTD.",
			"INPMT6|MAGARPATTA TOWNSHIP",
			"INSTM6|MIDC PHALTAN SEZ / SATARA",
			"INSTU6|MIDC SEZ / KESURDE",
			"INKLE6|MIDC SEZ / RAIGAD",
			"INAWM6|MIDC SEZ/AURANGABAD (Maharashtra",
			"INDID6|MIDC SEZ/NANDED",
			"INPUM6|MIDC SEZ/PUNE",
			"INBNG6|MMAuHmAbGaAiONICD/THAN",
			"ININB6|MPAKVN SEZ/Indore",
			"INADM6|MRPL-SEZ/AHMEDABAD",
			"INPNU6|MSFPL SEZ / PUNE",
			"INCGA6|MWCDL-Apparel-sez/Chengalpattu",
			"INCGL6|MWCDL-Auto ANCILLARIES-",
			"INCGI6|MWCDL-IT SEZ/Chengalpattu",
			"INMBS6|Madhosingh ICD",
			"INIXM6|Madurai ICD",
			"INMDA1|Magdalla",
			"INSHL6|Eh'!ware A",
			"INCOK41|Cochin A",
			"INBNRB|Bhimnagar",
			"INCOK6|Cochin (EPZ/SEZ)",
			"INBTMB|Bhithamore(Sursnad)",
			"INCOK1|Cochin Sea",
			"INBWD6|Bhiwadi",
			"INCBE6|Coimbatore",
			"INBWN1|Bhiwandi",
			"INCJB4|Coimbatore",
			"INBBI4|Bhubaneswar",
			"INIGU6|Coimbatore - Irugur ICD",
			"INBSL6|Bhusaval lCD",
			"INCHL1|Colachel",
			"INBLM1|Bilimora",
			"INCDP1|Coondapur (Ganguly)",
			"INSBC6|Biocon SEZ / Bangalore",
			"INC001|Coondapur (Ganguly)",
			"INBTR1|Bitra Island",
			"INCRN1|Cornwallis",
			"INBOLB|Bolanganj",
			"INCDL1|Cuddalore",
			"INBOM4|Bombay Air Cargo",
			"INDPR6|DAPPER",
			"INBOM1|Bombay Sea",
			"INCDD6|DCA-I SEZ/CHANDIGARH",
			"INBRM1|Borlai - Mendla",
			"INCDC6|DCA-II SEZ/CHANDIGARH",
			"INBRY1|Borya",
			"INBXR6|DLF SEZ/Kolkata",
			"INBRH1|Broach",
			"IN LPD 6|DLF/SEZ/Rangareddy",
			"INBSR1|Bulsar",
			"INCJD6|DISC SEZ / KANCHEEPURAM",
			"INCCJ1|C.H. Kozikode",
			"INVZM6|DLL SEZ/Visakhapatnam",
			"INTNC6|CCCL Infrastructure Ltd. -",
			"INDHP1|Dabhol Port",
			"INADC6|CCIPL-SEZ/AHMEDABAD",
			"ING014|Dabolim",
			"INADR6|CGRPL-SEZ/AHMEDABAD",
			"INTTP6|Dadri TTPL",
			"INVTC6|CHEYYAR-SEZ/Vellore",
			"INSTT6|Dadri - STTPL (CFS)",
			"INBVC6|CONCOR-ICD/BALLABHGARH",
			"IN ALP 6|Dadri, Greater Noida",
			"INTBC6|CTSI SEZ / SIRUSERI",
			"INAPL6|Dadri-ACPL CFS",
			"INCMB1|Cambay",
			"INCPL6|Dadri-CGML",
			"INCNN1|Cannanore",
			"INDHN1|Dahanu",
			"INCNB1|Car-Nicobar",
			"INDHU1|Dahanu",
			"INCHPB|Champai",
			"INDAH1|Dahej",
			"INCHMB|Chamurchi",
			"INBHD6|Dahez SEZ",
			"INCBDB|Changrabandh",
			"INDLUB|Dalu",
			"INCHR1|Chapora",
			"INDAM1|Daman & Diu",
			"INMAA6|Chennai (EPZ/SEZ)",
			"INDTW1|Dantiwara",
			"INMAA4|Chennai Air Cargo",
			"INDRGB|Darranga",
			"INMAA1|Chennai Sea",
			"INDLB6|Daulatabad ICD",
			"INCTI1|Chettat Island",
			"INDWKB|Dawici",
			"INCCH6|Chinchwad ( ICD)",
			"INDEL4|Delhi Air Cargo V",
			"INCLX6|Chirala V",
			"INDLI2|Delhi Railway Station",
			"INHGLS|Hingalganj",
			"INIXW6|Jamshedpur (ICD)",
			"INHWR1|Honawar",
			"INTAT6|Jamshedpur (ICD)",
			"INSNF6|Hyderabad",
			"INJWAB|larva",
			"INHYD4|Hyderabad Air Cargo",
			"INJAYB|Jayanagar",
			"INBDH6|ICD Badohi",
			"INJHOB|Jhulaghat (Pithoragarh)",
			"INDUR6|ICD Durgapur",
			"INJUX6|Jodhpur",
			"INLON6|ICD Loni",
			"INBRN6|Jodhpur- Boranda (EPZ/SEZ)",
			"INMWA6|ICD Malivtada",
			"INJDA1|Jodia",
			"INTVT6|ICD/Tondiarpet Chennai",
			"INJBNB|Jogbani",
			"INCJI6|IG31 SEZ / KANCHEEPURAM",
			"IN BHC 6|Jubilant-Chemical-SEZ/Vilayat",
			"IN TMI 6|IIFFCO/SEZ/Nellore",
			"INICAR6|KARUR",
			"INNKI6|IIIL SEZ / SINNAR",
			"INICAT1|KATTUPALLI",
			"ININI6|IIPL SEZ / Indore",
			"INBNC6|KBITS SEZ / Bangalore",
			"INPIT6|INFOSYS TECHNOLOGIES",
			"INPUN6|KBTV / PUNE",
			"INBAU6|IT/ITES-A-SEZ/Ulwe",
			"INTGN6|KEIPL / PUNE",
			"INBA16|IT/ITES-B-SEZ/Ulwe",
			"INHSF6|KIADBFP SEZ / Hassan",
			"IN BAT 6|IT/ITES-C SEZ/Ulwe",
			"INHSP6|KIADBP SEZ / Hassan",
			"INIMF4|Imphal",
			"INHST6|KIADBT SEZ / Hassan",
			"INIDR4|Indore",
			"INTVC6|KINFRAA SEZ / Thiruvananthapuram",
			"INIDR6|Indore (EPZ/SEZ)",
			"INCCT6|KINFRAFP SEZ / Kozhikkode",
			"INDHA6|Indore-Dhannad",
			"INPNK6|KLPPL-ICD/PANKI",
			"ININN6|Infosys SEZ / Indore",
			"INKBC6|KRIL ICD / HAZIRA",
			"INILP6|Irungattukottai-ILP ICD",
			"INPKR6|KRIL ICD/PALL",
			"IN FMJ 6|J T/SEZ/Rangareddy",
			"INCOA6|KSPL-SEZ/ICAKINADA",
			"INJBD1|Jafrabad",
			"INKDI1|Kadmat Island",
			"INJGD1|Jaigad",
			"INICAK1|Kakinada",
			"INJIGB|Jaigaon",
			"INC016|Kakinada",
			"INJA15|Jaipur",
			"INSKD6|Kalinganagar",
			"INJA14|Jaipur",
			"INICAL1|Kallai",
			"INJA16|Jaipur ICD",
			"INKLY1|Kalyan",
			"INJSZ6|Jaipur - Sitapur (EPZ/SEZ)",
			"INKKU6|Kanakpura - Jaipur LCD",
			"INJTP1|Jaitapur",
			"INIXY1|Kandla",
			"INJAK1|Jakhau",
			"INIXY6|Kandla (EPZ/SEZ)",
			"INJUC6|Jalandhar",
			"INKDL6|Kandla SEZ / Gandhidham",
			"INJAL6|Jalgaon",
			"INKND1|Kankudy",
			"INJPGB|Jalpaiguri V",
			"INCPC6|Kanpur",
			"INTLG6|Pune-Talegoan ICD",
			"INPRG1|Purangad",
			"INERP6|Puthuvypeen SEZ / Ernakulam",
			"INCCQ6|QBP / PUNE",
			"INBGQ6|Quest SEZ Belgaum",
			"INRTM6|RATLAM(CONCOR)",
			"INKOH6|RLL-SEZ/Medak",
			"INAKR6|RPCIPL SEZ/Visakhapatnam",
			"INMDR6|RTPL SEZ / MADURAI",
			"INRPL6|Raddipalem",
			"INRDP2|Radhikapur Railway Station",
			"INRAI6|Raipur",
			"INRKG1|Rajakkamangalam",
			"INATQ4|Rajasansi(Amritsar)",
			"INRAJ6|Rajkot",
			"INRJP1|Rajpara",
			"INRJR1|Rajpuri",
			"INRWR1|Rameshwaram",
			"INRAM1|Rameshwaram",
			"INRNG2|Ranaghat Railway Station",
			"INRGT1|Ranghat Bay",
			"INRNR1|Ranpar",
			"IN HUR 6|Rassi/SEZ/Anantpur",
			"INRTC1|Ratnagiri",
			"INRXLB|Raxaul",
			"IN VZR 6|Reddy'r/SEZ/Srikakulam",
			"INRED1|Redi",
			"INLPJ6|Reliance SEZ/ Jamnagar",
			"INRVD1|Revdanda",
			"INREA6|Rewari",
			"INRXL8|Rexaul",
			"INRGUB|Ryngku",
			"IN DBS 6|SANTA-SEZ/Vill-Muppireddipally",
			"INSCH6|SAP-SEZ/SURAT",
			"INCASE|SAPL SEZ / Ganjam",
			"INBRS6|SAhE m&e Cd aLbTaD.d- SEZ /WAGHODIA",
			"INKRM6|Maharashtra Airport",
			"INMHE1|Mahe",
			"INMGHB|Mahendraganj",
			"INMHN2|Mahisashan Railway Station",
			"INMHGB|Mahurighat",
			"INMHA1|Mahuva",
			"INMPR6|Malanpur ICD",
			"INGWL6|Malanpur(Gvtalior)",
			"INMLP1|Mallipuram",
			"INMAL1|Malpe",
			"INMLW1|Malvtan",
			"INMDP1|Mandapam",
			"INMDD6|Mandideep",
			"INMDV1|Mandvi",
			"INMNW1|Mandwa",
			"INIXE1|Mangalore",
			"INMAQ6|Mangalore SEZ",
			"INNML1|Mangalore Sea",
			"INMGR1|Mangrol",
			"INMKCB|Manikarchar",
			"INMNR1|Manori",
			"INMNUB|Manu",
			"INMDG6|Margao",
			"INMLI1|Maroli",
			"INMAP1|Masulipatnam",
			"INMYB1|Mayabandar",
			"INMDW1|Meadows",
			"INMTC6|Meerut",
			"INMTW1|Metwad",
			"INMCI1|Minicoy Island",
			"INMRJ6|Miraj",
			"INMRA1|Mora",
			"INMBC6|Moradabad (EPZ/SEZ)",
			"INMREB|Moreh",
			"INMDK1|Muldwarka",
			"INKLM6|Multi Service-SEZ Kalambolli",
			"INCES6|SEC Ltd-SEZ/Coimbatore",
			"INHS16|SIPC SEZ / KRISHNAGIRI",
			"INVLR6|SIPC SEZ / VELLORE",
			"INCJ06|SIPCOT",
			"INCJS6|SIPCOT Hi-Tech-SEZ Sriperumbudur",
			"INTEN6|SIPCOT-Gangaikondan-SEZ/Tirunelveli",
			"INPYS6|SIPCOT-SEZ/Erode",
			"INCSP6|SIPL SEZ / KANCHEEPURAM",
			"INTBM6|SPEHZP/L -NSaEnZg/Kuannerciheepuram",
			"INGNS6|SREHPL-SEZ/GANDHINAGAR",
			"INMUC6|SUNSTREAM CITY PVT.",
			"INCSV6|SVPL SEZ / COIMBATORE",
			"INPS16|SYNTEL INTERNATIONAL",
			"INSBI6|Sabarmati ICD",
			"INSABB|Sabroom",
			"INSAC6|Sachin(Surat)",
			"INSRE6|Saharanpur",
			"INSAL1|Salaya",
			"INSXT6|Salem",
			"INSLT6|Salt Lake (EPZ/SEZ)",
			"INSTP1|Satpati",
			"INAIR6|Serene Properties Private Limited",
			"INSBZB|Shelia Bazar",
			"INSWD1|Shriwardhan",
			"INSIK1|Sikka",
			"INSLR2|Silcher R.M.S. Office",
			"INSLRB|Silcher Steamerghat",
			"INSMR1|Simor",
			"INSBH1|Sinbhour",
			"INSHP1|Sinbhour Port",
			"INSNG2|Singabad Railway Station",
			"INSLL6|Singnallur",
			"INSTIB|Sitai",
			"INSNBB|Sonabarsa",
			"INSNLB|Sonauli",
			"IN TAS 6|Sri City Private Limited",
			"INVVAl|Veraval",
			"INWO1|Vijaydurg",
			"INNGSB|Village Namgaya Shipkila",
			"INVTZ6|Visakhapatnam (EPZ/SEZ)",
			"INVTZ4|Vishakapatnam",
			"INVTZ1|Vizac Sea",
			"INKVR6|WFPML-SEZ/KOWUR",
			"INAWW6|WIDL SEZ / AURANGABAD",
			"INCCW6|WIPRO / PUNE",
			"INWRR6|WPCL CHANDRAPUR",
			"INCHJ6|WWIL ICD/ WARDHA",
			"INWAL6|Waluj(Aurangabad)",
			"INAJE6|Welspun Anjar SEZ / Anjar",
			"INBNW6|Wipro SEZ/ Kolkata",
			"INZIP6|ZIPL-SEZ/AHMEDABAD",
			"INFMH6|hgsezl/Ranga Reddy V",
			"INBAM6|Multi Service-SEZ/Ulwe(Distt. Raigad)",
			"INBAP6|MultiService-SEZ",
			"INMUL6|Mulund",
			"INBOM6|Mumbai (EPZ/SEZ)",
			"INGRR6|Mumbai -DP-I",
			"INGRD6|Mumbai DP-II",
			"INMNB2|Munabao Railway Station",
			"INMUN1|Mundra",
			"INAJM6|Mundra Port SEZ",
			"INMRD1|Murad",
			"INCNC6|NCTL SEZ / KANCHEEPURAM",
			"IN VLN 6|NG REALTY- SEZ/Taluka Bavla Distt.",
			"INCJN6|NIPL-SEZ Sriperumbudur",
			"INPNE6|NTPL / PUNE",
			"INNPT1|Nagapattinam",
			"INNGP6|Nagpur",
			"INNAG4|Nagpur",
			"INNKNB|Namkhana",
			"INNAN1|Nancowrie",
			"INNDG1|Nandgaon",
			"INJNR4|Nashik-Janori ACC",
			"INJNR6|Nashik-Janori ICD",
			"INNSK6|Nasik",
			"INNVB1|Navabunder",
			"INNVP1|Navaspur",
			"INNAV1|Navlakhi",
			"INNMTB|Neamati steamer Ghat",
			"INNEE1|Neendakara",
			"INNGRB|Nepalgunj Road",
			"INNWP1|Newapur",
			"INNSA1|Nhava Sheva Sea",
			"INNVT1|Nivti",
			"INNDA6|Noida (EPZ/SEZ)",
			"INDER6|Noida-Dadri (ICD)",
			"INBBS6|01IDC SEZ/Bhubneshwar",
			"INGA06|OPGS SEZ / Gandhidham",
			"IPISMPE|Srimantapur",
			"INSXR4|Srinagar",
			"IN FMS 6|Stargaze/Rangareddy/SEZ",
			"INBHS6|Sterling - SEZ / Bharuch",
			"INSKPB|Sukhia Pokhari",
			"IN LPI 6|Sundew/SEZ/Rangareddy",
			"INSRV1|Surasani - Yanam",
			"INSTV6|Surat (EPZ/SEZ)",
			"IN HZR 6|Surat ICD",
			"INSTRB|Sutarkandi",
			"INUDI6|Synefra SEZ / Udipi",
			"INTNK1|T ankari",
			"INTTSB|T.T. Shed (Kidcerpore)",
			"ININT6|TCS SEZ / Indore",
			"INBNT6|TCS SEZ/Kolkata",
			"INGNT6|TCS-SEZ/GANDHINAGAR",
			"INTBT6|TCSL SEZ / SIRUSERI",
			"INCBT6|TDPL SEZ / COIMBATORE",
			"INMAS6|TIPL SEZ / CHENNAI",
			"INNPGB|TNEaRmMpIoNnAgLS LTD.",
			"INTRI1|Tadri",
			"INTJA1|Talaja",
			"INTPN1|Talpona",
			"INTRP1|Tarapur",
			"INTEL1|Tellichery",
			"INTJPB|Tezpur Steamerghat",
			"INTHL1|Thal","INTNA1|Thana",
			"INSAU6|Thar Dry Port - Ahemdabad ICD",
			"INTHA6|Thar Dry Port - Jodhpur ICD",
			"INTPH1|Thopputhurai",
			"IN TCR 6|Thrissur ICD",
			"INTKNB|Tikonia",
			"INTRZ4|Tiruchirapalli",
			"INTYR1|Tirukkadayyur",
			"INCHE6|Tiruppur - Chettipalayam CFS",
        );
        
        foreach ( $postCodeArr as $postCode )
        {
            $exp = explode( "|" , $postCode);
            $data['ipc_number'] = $exp[0];
            $data['ipc_state_name'] = $exp[1];
            $data['ipc_status'] = 1;
            
            $this->db->insert( "invoice_post_code", $data );
        }
    }
    
    function generateCaptcha()
    {
        echo generateCaptcha();
    }
    
    function SendMailTemplate1()
    {
        $this->load->model('admin/mdl_invoice','inv');
        $this->inv->cTableName = "invoice";
        $this->inv->cAutoId = "invoice_id";
        $this->cPrimaryId  = 1;
        $dtArr = $this->inv->getData();
        $response = $dtArr->row_array();
        
        /* $data['document type'] = $response['document type']; */
        $data['document_number'] = "<b>".$response['admin_invoice_id']."</b>";
        $data['document_total'] = "<b>".$response['i_total']."</b>";
        $data['issue_date'] = "<b>".formatDate( 'd-m-Y', $response['i_issue_date'] )."</b>";
        $data['due_date'] = "<b>".formatDate( 'd-m-Y', $response['i_due_date'] )."</b>";
        $data['client_name'] = "<b>".$response['c_name']."</b>";
        $data['client_contact'] = "<b>".$response['c_phone']."</b>";
        $data['paypal_payment_link'] = "<b>".$response['i_amount_paid_online']."</b>";
        
        $data['email_address'] = "kakdiya.gautam288@gmail.com";
        getTemplateDetailAndSendMail('TEMPLATE-1',$data);
    }
    
    function preQuery()
    {
        query( "ALTER TABLE `admin_user` ADD `admin_user_newslatter` TINYINT(1) NOT NULL DEFAULT '0' AFTER `admin_user_password`;" );
        
//         query( "ALTER TABLE `invoice` CHANGE `i_payment_type` `payment_type_id` INT(10) NULL DEFAULT '0' AFTER `admin_invoice_id`;");
    }
    
    function compressVideo()
    {
		
        $out = "assets/compress_video/compress";
        exec("ls -lh assets/compress_video/st.mp4",$out);// pass file path here
       
        $size=explode(' ',$out[0]);
        
        print_r($size[4]);
    }
	
	function testAPI()
	{
		//extract data from the post
		//set POST variables
		$url = "https://www.clickoncare.com/Z2x1dG9uZWFwaQ==/R2x1dG9uZWRhc2hib2FyZA/getCustomerCollection";
		$fields = array(
			'page' => urlencode(1),
			'size' => urlencode(20),
			'username'   => urlencode('suhas'),
			'password'   => urlencode('hU@RO1h8#')
		);

		$fields_string = "";
		//url-ify the data for the POST
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		
		rtrim($fields_string, '&');

		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

		//execute post
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);
		
		pr( $result );
	}
}