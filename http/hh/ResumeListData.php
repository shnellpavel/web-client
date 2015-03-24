<?php
/**
 * User: shnell
 * Date: 19.03.15
 * Time: 23:19
 */

namespace web_client\http\hh;

use web_client\http\AHttpData;

class ResumeListData extends AHttpData {
    public $itemsOnPage = 100;
    public $orderBy = 'publication_time';
    public $areas;
    public $expPeriod = 'all_time';
    public $text;
    public $pos = 'full_text';
    public $logic = 'normal';
    public $clusters = 'true';
    public $specializations = array();
    public $relocation = 'living_or_relocation';
    public $salaryFrom;
    public $salaryTo;
    public $currencyCode;
    public $education;
    public $ageFrom;
    public $ageTo;
    public $gender = 'unknown';
    public $searchPeriod = 0;

    // /search/resume?items_on_page=100&specialization=2.463&specialization=2.469&specialization=2.468&specialization=2.200&clusters=true&page=0
    /**
     * @return array
     */
    public function toArray() {
        $res = array(
            'items_on_page' => $this->itemsOnPage,
            'clusters' => $this->clusters,
        );
        if ($this->orderBy) {
            $res['order_by'] = $this->orderBy;
        }
        if ($this->areas) {
            $res['area'] = $this->areas;
        }
        if ($this->expPeriod) {
            $res['exp_period'] = $this->expPeriod;
        }
        if ($this->text) {
            $res['text'] = $this->text;
        }
        if ($this->pos) {
            $res['pos'] = implode(',', $this->pos);
        }
        if ($this->logic) {
            $res['logic'] = $this->logic;
        }
        if ($this->specializations) {
            $res['specialization'] = $this->specializations;
        }
        if ($this->relocation) {
            $res['relocation'] = $this->relocation;
        }
        if ($this->salaryFrom) {
            $res['salary_from'] = $this->salaryFrom;
        }
        if ($this->salaryTo) {
            $res['salary_to'] = $this->salaryTo;
        }
        if ($this->currencyCode) {
            $res['currency_code'] = $this->currencyCode;
        }
        if ($this->education) {
            $res['education'] = $this->education;
        }
        if ($this->ageFrom) {
            $res['age_from'] = $this->ageFrom;
        }
        if ($this->ageTo) {
            $res['age_to'] = $this->ageTo;
        }
        if ($this->gender) {
            $res['gender'] = $this->gender;
        }
        if ($this->searchPeriod) {
            $res['search_period'] = $this->searchPeriod;
        }

        return $res;
    }

    public function toParams() {
        $res = $this->toArray();
        unset($res['area'], $res['specialization']);
        $params = http_build_query($res);

        foreach ($this->specializations as $specialization) {
            $params .= '&specialization='.urlencode($specialization);
        }

        foreach ($this->areas as $area) {
            $params .= '&area='.urlencode($area);
        }

        return $params;
    }

    public static function getAvailablePositions() {
        return array(
            array(
                "value" => 'full_text',
                "label" => "везде",
                "children" => array(
                    array(
                        "value" => 'position',
                        "label" => "в названии резюме",
                    ),
                    array(
                        "value" => 'education',
                        "label" => "в образовании",
                    ),
                    array(
                        "value" => 'keywords',
                        "label" => "в ключевых навыках",
                    ),
                    array(
                        "value" => 'workplaces',
                        "label" => "в опыте работы",
                        "children" => array(
                            array(
                                "value" => 'workplace_organization',
                                "label" => "в компаниях и отраслях",
                            ),
                            array(
                                "value" => 'workplace_position',
                                "label" => "в должностях",
                            ),
                            array(
                                "value" => 'workplace_description',
                                "label" => "в обязанностях",
                            ),
                        ),
                    ),
                ),
            ),
        );
    }

    public static function getAvailableAreas() {
        return array(
            array(
                "value" => 113,
                "label" => "Россия",
                "children" =>  array(
                    array(
                        "value" => 2114,
                        "label" => "АР Крым",
                        "children" =>  array(
                            array(
                                "value" => 2698,
                                "label" => "Алупка"
                            ),
                            array(
                                "value" => 2381,
                                "label" => "Алушта"
                            ),
                            array(
                                "value" => 2699,
                                "label" => "Армянск"
                            ),
                            array(
                                "value" => 2700,
                                "label" => "Бахчисарай"
                            ),
                            array(
                                "value" => 2389,
                                "label" => "Белогорск (Крым)"
                            ),
                            array(
                                "value" => 2382,
                                "label" => "Гурзуф"
                            ),
                            array(
                                "value" => 2386,
                                "label" => "Джанкой"
                            ),
                            array(
                                "value" => 2115,
                                "label" => "Евпатория"
                            ),
                            array(
                                "value" => 2388,
                                "label" => "Инкерман"
                            ),
                            array(
                                "value" => 2116,
                                "label" => "Керчь"
                            ),
                            array(
                                "value" => 2701,
                                "label" => "Кировское"
                            ),
                            array(
                                "value" => 2384,
                                "label" => "Коктебель"
                            ),
                            array(
                                "value" => 2392,
                                "label" => "Красногвардейское"
                            ),
                            array(
                                "value" => 2391,
                                "label" => "Красноперекопск"
                            ),
                            array(
                                "value" => 2702,
                                "label" => "Ленино"
                            ),
                            array(
                                "value" => 2738,
                                "label" => "Нижнегорский"
                            ),
                            array(
                                "value" => 2393,
                                "label" => "Первомайское"
                            ),
                            array(
                                "value" => 2703,
                                "label" => "Раздольное"
                            ),
                            array(
                                "value" => 2385,
                                "label" => "Саки"
                            ),
                            array(
                                "value" => 130,
                                "label" => "Севастополь"
                            ),
                            array(
                                "value" => 131,
                                "label" => "Симферополь"
                            ),
                            array(
                                "value" => 2739,
                                "label" => "Советский "
                            ),
                            array(
                                "value" => 2704,
                                "label" => "Советский (АР Крым)"
                            ),
                            array(
                                "value" => 2705,
                                "label" => "Старый Крым"
                            ),
                            array(
                                "value" => 2383,
                                "label" => "Судак"
                            ),
                            array(
                                "value" => 2119,
                                "label" => "Феодосия"
                            ),
                            array(
                                "value" => 2387,
                                "label" => "Форос"
                            ),
                            array(
                                "value" => 2390,
                                "label" => "Черноморское"
                            ),
                            array(
                                "value" => 2706,
                                "label" => "Щелкино"
                            ),
                            array(
                                "value" => 2737,
                                "label" => "Щёлкино"
                            ),
                            array(
                                "value" => 2120,
                                "label" => "Ялта"
                            )
                        ),
                    ),
                    array(
                        "value" => 1217,
                        "label" => "Алтайский край",
                        "children" =>  array(
                            array(
                                "value" => 1218,
                                "label" => "Алейск"
                            ),
                            array(
                                "value" => 11,
                                "label" => "Барнаул"
                            ),
                            array(
                                "value" => 1219,
                                "label" => "Белокуриха"
                            ),
                            array(
                                "value" => 1220,
                                "label" => "Бийск"
                            ),
                            array(
                                "value" => 1221,
                                "label" => "Горняк"
                            ),
                            array(
                                "value" => 1222,
                                "label" => "Заринск"
                            ),
                            array(
                                "value" => 1223,
                                "label" => "Змеиногорск"
                            ),
                            array(
                                "value" => 1224,
                                "label" => "Камень-на-Оби"
                            ),
                            array(
                                "value" => 1225,
                                "label" => "Новоалтайск"
                            ),
                            array(
                                "value" => 1226,
                                "label" => "Рубцовск"
                            ),
                            array(
                                "value" => 1227,
                                "label" => "Славгород (Алтайский край)"
                            ),
                            array(
                                "value" => 2655,
                                "label" => "Усть-Калманка"
                            ),
                            array(
                                "value" => 1228,
                                "label" => "Яровое"
                            )
                        ),
                    ),
                    array(
                        "value" => 1932,
                        "label" => "Амурская область",
                        "children" =>  array(
                            array(
                                "value" => 1933,
                                "label" => "Белогорск"
                            ),
                            array(
                                "value" => 12,
                                "label" => "Благовещенск (Амурская область)"
                            ),
                            array(
                                "value" => 1934,
                                "label" => "Завитинск"
                            ),
                            array(
                                "value" => 1935,
                                "label" => "Зея"
                            ),
                            array(
                                "value" => 1936,
                                "label" => "Райчихинск"
                            ),
                            array(
                                "value" => 1937,
                                "label" => "Свободный"
                            ),
                            array(
                                "value" => 1938,
                                "label" => "Сковородино"
                            ),
                            array(
                                "value" => 1939,
                                "label" => "Тында"
                            ),
                            array(
                                "value" => 1940,
                                "label" => "Шимановск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1008,
                        "label" => "Архангельская область",
                        "children" =>  array(
                            array(
                                "value" => 14,
                                "label" => "Архангельск"
                            ),
                            array(
                                "value" => 2436,
                                "label" => "Вельск"
                            ),
                            array(
                                "value" => 1009,
                                "label" => "Каргополь"
                            ),
                            array(
                                "value" => 1010,
                                "label" => "Коряжма"
                            ),
                            array(
                                "value" => 1011,
                                "label" => "Котлас"
                            ),
                            array(
                                "value" => 1012,
                                "label" => "Мезень"
                            ),
                            array(
                                "value" => 1013,
                                "label" => "Мирный (Архангельская область)"
                            ),
                            array(
                                "value" => 1014,
                                "label" => "Новодвинск"
                            ),
                            array(
                                "value" => 1015,
                                "label" => "Няндома"
                            ),
                            array(
                                "value" => 1016,
                                "label" => "Онега"
                            ),
                            array(
                                "value" => 1017,
                                "label" => "Северодвинск"
                            ),
                            array(
                                "value" => 1018,
                                "label" => "Сольвычегодск"
                            ),
                            array(
                                "value" => 1019,
                                "label" => "Шенкурск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1505,
                        "label" => "Астраханская область",
                        "children" =>  array(
                            array(
                                "value" => 15,
                                "label" => "Астрахань"
                            ),
                            array(
                                "value" => 1506,
                                "label" => "Ахтубинск"
                            ),
                            array(
                                "value" => 1507,
                                "label" => "Знаменск"
                            ),
                            array(
                                "value" => 1508,
                                "label" => "Камызяк"
                            ),
                            array(
                                "value" => 1509,
                                "label" => "Нариманов"
                            ),
                            array(
                                "value" => 1510,
                                "label" => "Харабали"
                            )
                        ),
                    ),
                    array(
                        "value" => 1817,
                        "label" => "Белгородская область",
                        "children" =>  array(
                            array(
                                "value" => 1818,
                                "label" => "Алексеевка"
                            ),
                            array(
                                "value" => 17,
                                "label" => "Белгород"
                            ),
                            array(
                                "value" => 1819,
                                "label" => "Бирюч"
                            ),
                            array(
                                "value" => 1820,
                                "label" => "Валуйки"
                            ),
                            array(
                                "value" => 1821,
                                "label" => "Грайворон"
                            ),
                            array(
                                "value" => 1822,
                                "label" => "Губкин"
                            ),
                            array(
                                "value" => 1823,
                                "label" => "Короча"
                            ),
                            array(
                                "value" => 1824,
                                "label" => "Новый Оскол"
                            ),
                            array(
                                "value" => 1825,
                                "label" => "Старый Оскол"
                            ),
                            array(
                                "value" => 1826,
                                "label" => "Строитель"
                            ),
                            array(
                                "value" => 1827,
                                "label" => "Шебекино"
                            )
                        ),
                    ),
                    array(
                        "value" => 1828,
                        "label" => "Брянская область",
                        "children" =>  array(
                            array(
                                "value" => 19,
                                "label" => "Брянск"
                            ),
                            array(
                                "value" => 1829,
                                "label" => "Дятьково"
                            ),
                            array(
                                "value" => 1830,
                                "label" => "Жуковка (Брянская область)"
                            ),
                            array(
                                "value" => 1831,
                                "label" => "Злынка"
                            ),
                            array(
                                "value" => 1832,
                                "label" => "Карачев"
                            ),
                            array(
                                "value" => 2646,
                                "label" => "Клетня"
                            ),
                            array(
                                "value" => 1833,
                                "label" => "Клинцы"
                            ),
                            array(
                                "value" => 1834,
                                "label" => "Мглин"
                            ),
                            array(
                                "value" => 1835,
                                "label" => "Новозыбков"
                            ),
                            array(
                                "value" => 1836,
                                "label" => "Почеп"
                            ),
                            array(
                                "value" => 1837,
                                "label" => "Севск"
                            ),
                            array(
                                "value" => 1838,
                                "label" => "Сельцо"
                            ),
                            array(
                                "value" => 1839,
                                "label" => "Стародуб"
                            ),
                            array(
                                "value" => 1840,
                                "label" => "Сураж"
                            ),
                            array(
                                "value" => 1841,
                                "label" => "Трубчевск"
                            ),
                            array(
                                "value" => 1842,
                                "label" => "Унеча"
                            ),
                            array(
                                "value" => 1843,
                                "label" => "Фокино (Брянская область)"
                            )
                        ),
                    ),
                    array(
                        "value" => 1716,
                        "label" => "Владимирская область",
                        "children" =>  array(
                            array(
                                "value" => 1717,
                                "label" => "Александров"
                            ),
                            array(
                                "value" => 23,
                                "label" => "Владимир"
                            ),
                            array(
                                "value" => 1718,
                                "label" => "Вязники"
                            ),
                            array(
                                "value" => 1719,
                                "label" => "Гороховец"
                            ),
                            array(
                                "value" => 1720,
                                "label" => "Гусь-Хрустальный"
                            ),
                            array(
                                "value" => 1721,
                                "label" => "Камешково"
                            ),
                            array(
                                "value" => 1722,
                                "label" => "Карабаново"
                            ),
                            array(
                                "value" => 1723,
                                "label" => "Киржач"
                            ),
                            array(
                                "value" => 1724,
                                "label" => "Ковров"
                            ),
                            array(
                                "value" => 1725,
                                "label" => "Кольчугино"
                            ),
                            array(
                                "value" => 1726,
                                "label" => "Костерево"
                            ),
                            array(
                                "value" => 1727,
                                "label" => "Курлово"
                            ),
                            array(
                                "value" => 1728,
                                "label" => "Лакинск"
                            ),
                            array(
                                "value" => 1729,
                                "label" => "Меленки"
                            ),
                            array(
                                "value" => 1730,
                                "label" => "Муром"
                            ),
                            array(
                                "value" => 1731,
                                "label" => "Петушки"
                            ),
                            array(
                                "value" => 1732,
                                "label" => "Покров"
                            ),
                            array(
                                "value" => 1733,
                                "label" => "Радужный (Владимирская область)"
                            ),
                            array(
                                "value" => 1734,
                                "label" => "Собинка"
                            ),
                            array(
                                "value" => 2692,
                                "label" => "Ставрово"
                            ),
                            array(
                                "value" => 1735,
                                "label" => "Струнино"
                            ),
                            array(
                                "value" => 1736,
                                "label" => "Судогда"
                            ),
                            array(
                                "value" => 1737,
                                "label" => "Суздаль"
                            ),
                            array(
                                "value" => 1738,
                                "label" => "Юрьев-Польский"
                            )
                        ),
                    ),
                    array(
                        "value" => 1511,
                        "label" => "Волгоградская область",
                        "children" =>  array(
                            array(
                                "value" => 24,
                                "label" => "Волгоград"
                            ),
                            array(
                                "value" => 1512,
                                "label" => "Волжский"
                            ),
                            array(
                                "value" => 1513,
                                "label" => "Дубовка"
                            ),
                            array(
                                "value" => 1514,
                                "label" => "Жирновск"
                            ),
                            array(
                                "value" => 2710,
                                "label" => "Иловля"
                            ),
                            array(
                                "value" => 1515,
                                "label" => "Калач-на-Дону"
                            ),
                            array(
                                "value" => 1516,
                                "label" => "Камышин"
                            ),
                            array(
                                "value" => 1517,
                                "label" => "Котельниково"
                            ),
                            array(
                                "value" => 1518,
                                "label" => "Котово"
                            ),
                            array(
                                "value" => 1519,
                                "label" => "Краснослободск (Волгоградская область)"
                            ),
                            array(
                                "value" => 1520,
                                "label" => "Ленинск"
                            ),
                            array(
                                "value" => 1521,
                                "label" => "Михайловка"
                            ),
                            array(
                                "value" => 1522,
                                "label" => "Николаевск"
                            ),
                            array(
                                "value" => 1523,
                                "label" => "Новоаннинский"
                            ),
                            array(
                                "value" => 1524,
                                "label" => "Палласовка"
                            ),
                            array(
                                "value" => 1525,
                                "label" => "Петров Вал"
                            ),
                            array(
                                "value" => 2709,
                                "label" => "Рудня (Волгоградская область)"
                            ),
                            array(
                                "value" => 2651,
                                "label" => "Светлый Яр"
                            ),
                            array(
                                "value" => 1526,
                                "label" => "Серафимович"
                            ),
                            array(
                                "value" => 1527,
                                "label" => "Суровикино"
                            ),
                            array(
                                "value" => 1528,
                                "label" => "Урюпинск"
                            ),
                            array(
                                "value" => 1529,
                                "label" => "Фролово"
                            )
                        ),
                    ),
                    array(
                        "value" => 1739,
                        "label" => "Вологодская область",
                        "children" =>  array(
                            array(
                                "value" => 1740,
                                "label" => "Бабаево"
                            ),
                            array(
                                "value" => 1741,
                                "label" => "Белозерск"
                            ),
                            array(
                                "value" => 1742,
                                "label" => "Великий Устюг"
                            ),
                            array(
                                "value" => 25,
                                "label" => "Вологда"
                            ),
                            array(
                                "value" => 1743,
                                "label" => "Вытегра"
                            ),
                            array(
                                "value" => 1744,
                                "label" => "Грязовец"
                            ),
                            array(
                                "value" => 1745,
                                "label" => "Кадников"
                            ),
                            array(
                                "value" => 1746,
                                "label" => "Кириллов"
                            ),
                            array(
                                "value" => 1747,
                                "label" => "Красавино"
                            ),
                            array(
                                "value" => 1748,
                                "label" => "Никольск (Вологодская область)"
                            ),
                            array(
                                "value" => 1749,
                                "label" => "Сокол"
                            ),
                            array(
                                "value" => 1750,
                                "label" => "Тотьма"
                            ),
                            array(
                                "value" => 1751,
                                "label" => "Устюжна"
                            ),
                            array(
                                "value" => 1752,
                                "label" => "Харовск"
                            ),
                            array(
                                "value" => 1753,
                                "label" => "Череповец"
                            ),
                            array(
                                "value" => 2629,
                                "label" => "Шексна"
                            )
                        ),
                    ),
                    array(
                        "value" => 1844,
                        "label" => "Воронежская область",
                        "children" =>  array(
                            array(
                                "value" => 2438,
                                "label" => "Анна"
                            ),
                            array(
                                "value" => 1845,
                                "label" => "Бобров"
                            ),
                            array(
                                "value" => 1846,
                                "label" => "Богучар"
                            ),
                            array(
                                "value" => 1847,
                                "label" => "Борисоглебск"
                            ),
                            array(
                                "value" => 1848,
                                "label" => "Бутурлиновка"
                            ),
                            array(
                                "value" => 2433,
                                "label" => "Верхняя Хава"
                            ),
                            array(
                                "value" => 26,
                                "label" => "Воронеж"
                            ),
                            array(
                                "value" => 2661,
                                "label" => "Грибановский"
                            ),
                            array(
                                "value" => 1849,
                                "label" => "Калач"
                            ),
                            array(
                                "value" => 2397,
                                "label" => "Каменка (Воронежская область)"
                            ),
                            array(
                                "value" => 2660,
                                "label" => "Кантемировка"
                            ),
                            array(
                                "value" => 1850,
                                "label" => "Лиски"
                            ),
                            array(
                                "value" => 2647,
                                "label" => "Новая Усмань"
                            ),
                            array(
                                "value" => 1851,
                                "label" => "Нововоронеж"
                            ),
                            array(
                                "value" => 1852,
                                "label" => "Новохоперск"
                            ),
                            array(
                                "value" => 2663,
                                "label" => "Ольховатка"
                            ),
                            array(
                                "value" => 1853,
                                "label" => "Острогожск"
                            ),
                            array(
                                "value" => 1854,
                                "label" => "Павловск (Воронежская область)"
                            ),
                            array(
                                "value" => 1855,
                                "label" => "Поворино"
                            ),
                            array(
                                "value" => 2659,
                                "label" => "Подгоренский"
                            ),
                            array(
                                "value" => 2662,
                                "label" => "Рамонь"
                            ),
                            array(
                                "value" => 1856,
                                "label" => "Россошь"
                            ),
                            array(
                                "value" => 1857,
                                "label" => "Семилуки"
                            ),
                            array(
                                "value" => 2553,
                                "label" => "Таловая"
                            ),
                            array(
                                "value" => 2489,
                                "label" => "Хохольский"
                            ),
                            array(
                                "value" => 1858,
                                "label" => "Эртиль"
                            )
                        ),
                    ),
                    array(
                        "value" => 1941,
                        "label" => "Еврейская АО",
                        "children" =>  array(
                            array(
                                "value" => 31,
                                "label" => "Биробиджан"
                            ),
                            array(
                                "value" => 1942,
                                "label" => "Облучье"
                            )
                        ),
                    ),
                    array(
                        "value" => 1192,
                        "label" => "Забайкальский край",
                        "children" =>  array(
                            array(
                                "value" => 216,
                                "label" => "Агинское (Забайкальский АО)"
                            ),
                            array(
                                "value" => 1193,
                                "label" => "Балей"
                            ),
                            array(
                                "value" => 1194,
                                "label" => "Борзя"
                            ),
                            array(
                                "value" => 2399,
                                "label" => "Забайкальск"
                            ),
                            array(
                                "value" => 1195,
                                "label" => "Краснокаменск"
                            ),
                            array(
                                "value" => 1196,
                                "label" => "Могоча"
                            ),
                            array(
                                "value" => 1197,
                                "label" => "Нерчинск"
                            ),
                            array(
                                "value" => 2691,
                                "label" => "Новая Чара"
                            ),
                            array(
                                "value" => 1198,
                                "label" => "Петровск-Забайкальский"
                            ),
                            array(
                                "value" => 1199,
                                "label" => "Сретенск"
                            ),
                            array(
                                "value" => 1200,
                                "label" => "Хилок"
                            ),
                            array(
                                "value" => 106,
                                "label" => "Чита"
                            ),
                            array(
                                "value" => 1201,
                                "label" => "Шилка"
                            )
                        ),
                    ),
                    array(
                        "value" => 1754,
                        "label" => "Ивановская область",
                        "children" =>  array(
                            array(
                                "value" => 1755,
                                "label" => "Вичуга"
                            ),
                            array(
                                "value" => 1756,
                                "label" => "Гаврилов Посад"
                            ),
                            array(
                                "value" => 1757,
                                "label" => "Заволжск"
                            ),
                            array(
                                "value" => 32,
                                "label" => "Иваново (Ивановская область)"
                            ),
                            array(
                                "value" => 1758,
                                "label" => "Кинешма"
                            ),
                            array(
                                "value" => 1759,
                                "label" => "Комсомольск (Ивановская область)"
                            ),
                            array(
                                "value" => 1760,
                                "label" => "Кохма"
                            ),
                            array(
                                "value" => 1761,
                                "label" => "Наволоки"
                            ),
                            array(
                                "value" => 1762,
                                "label" => "Плес"
                            ),
                            array(
                                "value" => 1763,
                                "label" => "Приволжск"
                            ),
                            array(
                                "value" => 1764,
                                "label" => "Пучеж"
                            ),
                            array(
                                "value" => 1765,
                                "label" => "Родники"
                            ),
                            array(
                                "value" => 1766,
                                "label" => "Тейково"
                            ),
                            array(
                                "value" => 1767,
                                "label" => "Фурманов"
                            ),
                            array(
                                "value" => 1768,
                                "label" => "Шуя"
                            ),
                            array(
                                "value" => 1769,
                                "label" => "Южа"
                            ),
                            array(
                                "value" => 1770,
                                "label" => "Юрьевец"
                            )
                        ),
                    ),
                    array(
                        "value" => 1124,
                        "label" => "Иркутская область",
                        "children" =>  array(
                            array(
                                "value" => 1125,
                                "label" => "Алзамай"
                            ),
                            array(
                                "value" => 1126,
                                "label" => "Ангарск"
                            ),
                            array(
                                "value" => 1127,
                                "label" => "Байкальск"
                            ),
                            array(
                                "value" => 1128,
                                "label" => "Бирюсинск"
                            ),
                            array(
                                "value" => 1129,
                                "label" => "Бодайбо"
                            ),
                            array(
                                "value" => 1130,
                                "label" => "Братск"
                            ),
                            array(
                                "value" => 1131,
                                "label" => "Вихоревка"
                            ),
                            array(
                                "value" => 1132,
                                "label" => "Железногорск-Илимский"
                            ),
                            array(
                                "value" => 1133,
                                "label" => "Зима"
                            ),
                            array(
                                "value" => 35,
                                "label" => "Иркутск"
                            ),
                            array(
                                "value" => 1134,
                                "label" => "Киренск"
                            ),
                            array(
                                "value" => 1135,
                                "label" => "Нижнеудинск"
                            ),
                            array(
                                "value" => 1136,
                                "label" => "Саянск"
                            ),
                            array(
                                "value" => 1137,
                                "label" => "Свирск"
                            ),
                            array(
                                "value" => 1138,
                                "label" => "Слюдянка"
                            ),
                            array(
                                "value" => 1139,
                                "label" => "Тайшет"
                            ),
                            array(
                                "value" => 1140,
                                "label" => "Тулун"
                            ),
                            array(
                                "value" => 1141,
                                "label" => "Усолье-Сибирское"
                            ),
                            array(
                                "value" => 1142,
                                "label" => "Усть-Илимск"
                            ),
                            array(
                                "value" => 1143,
                                "label" => "Усть-Кут"
                            ),
                            array(
                                "value" => 217,
                                "label" => "Усть-Ордынский"
                            ),
                            array(
                                "value" => 1144,
                                "label" => "Черемхово"
                            ),
                            array(
                                "value" => 1145,
                                "label" => "Шелехов"
                            )
                        ),
                    ),
                    array(
                        "value" => 1463,
                        "label" => "Кабардино-Балкарская республика",
                        "children" =>  array(
                            array(
                                "value" => 1464,
                                "label" => "Баксан"
                            ),
                            array(
                                "value" => 1465,
                                "label" => "Майский"
                            ),
                            array(
                                "value" => 39,
                                "label" => "Нальчик"
                            ),
                            array(
                                "value" => 1466,
                                "label" => "Нарткала"
                            ),
                            array(
                                "value" => 1467,
                                "label" => "Прохладный"
                            ),
                            array(
                                "value" => 1468,
                                "label" => "Терек"
                            ),
                            array(
                                "value" => 1469,
                                "label" => "Тырныауз"
                            ),
                            array(
                                "value" => 1470,
                                "label" => "Чегем"
                            )
                        ),
                    ),
                    array(
                        "value" => 1020,
                        "label" => "Калининградская область",
                        "children" =>  array(
                            array(
                                "value" => 1021,
                                "label" => "Багратионовск"
                            ),
                            array(
                                "value" => 1022,
                                "label" => "Балтийск"
                            ),
                            array(
                                "value" => 1023,
                                "label" => "Гвардейск"
                            ),
                            array(
                                "value" => 1024,
                                "label" => "Гурьевск (Калининградская область)"
                            ),
                            array(
                                "value" => 1025,
                                "label" => "Гусев"
                            ),
                            array(
                                "value" => 1026,
                                "label" => "Зеленоградск"
                            ),
                            array(
                                "value" => 41,
                                "label" => "Калининград"
                            ),
                            array(
                                "value" => 1027,
                                "label" => "Краснознаменск (Калининградская область)"
                            ),
                            array(
                                "value" => 1028,
                                "label" => "Ладушкин"
                            ),
                            array(
                                "value" => 1029,
                                "label" => "Мамоново"
                            ),
                            array(
                                "value" => 1030,
                                "label" => "Неман"
                            ),
                            array(
                                "value" => 1031,
                                "label" => "Нестеров"
                            ),
                            array(
                                "value" => 1032,
                                "label" => "Озерск (Калининградская область)"
                            ),
                            array(
                                "value" => 1033,
                                "label" => "Пионерский"
                            ),
                            array(
                                "value" => 1034,
                                "label" => "Полесск"
                            ),
                            array(
                                "value" => 1035,
                                "label" => "Правдинск"
                            ),
                            array(
                                "value" => 1036,
                                "label" => "Светлогорск (Калининградская область)"
                            ),
                            array(
                                "value" => 1037,
                                "label" => "Светлый"
                            ),
                            array(
                                "value" => 1038,
                                "label" => "Славск"
                            ),
                            array(
                                "value" => 1039,
                                "label" => "Советск (Калининградская область)"
                            ),
                            array(
                                "value" => 1040,
                                "label" => "Черняховск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1859,
                        "label" => "Калужская область",
                        "children" =>  array(
                            array(
                                "value" => 1860,
                                "label" => "Балабаново"
                            ),
                            array(
                                "value" => 1861,
                                "label" => "Белоусово"
                            ),
                            array(
                                "value" => 1862,
                                "label" => "Боровск"
                            ),
                            array(
                                "value" => 2668,
                                "label" => "Думиничи"
                            ),
                            array(
                                "value" => 1863,
                                "label" => "Ермолино"
                            ),
                            array(
                                "value" => 1864,
                                "label" => "Жиздра"
                            ),
                            array(
                                "value" => 1865,
                                "label" => "Жуков"
                            ),
                            array(
                                "value" => 43,
                                "label" => "Калуга"
                            ),
                            array(
                                "value" => 1866,
                                "label" => "Киров (Калужская область)"
                            ),
                            array(
                                "value" => 1867,
                                "label" => "Козельск"
                            ),
                            array(
                                "value" => 1868,
                                "label" => "Кондрово"
                            ),
                            array(
                                "value" => 1869,
                                "label" => "Кременки"
                            ),
                            array(
                                "value" => 1870,
                                "label" => "Людиново"
                            ),
                            array(
                                "value" => 1871,
                                "label" => "Малоярославец"
                            ),
                            array(
                                "value" => 1872,
                                "label" => "Медынь"
                            ),
                            array(
                                "value" => 1873,
                                "label" => "Мещовск"
                            ),
                            array(
                                "value" => 1874,
                                "label" => "Мосальск"
                            ),
                            array(
                                "value" => 301,
                                "label" => "Обнинск"
                            ),
                            array(
                                "value" => 1875,
                                "label" => "Сосенский"
                            ),
                            array(
                                "value" => 1876,
                                "label" => "Спас-Деменск"
                            ),
                            array(
                                "value" => 1877,
                                "label" => "Сухиничи"
                            ),
                            array(
                                "value" => 1878,
                                "label" => "Таруса"
                            ),
                            array(
                                "value" => 1879,
                                "label" => "Юхнов"
                            )
                        ),
                    ),
                    array(
                        "value" => 1943,
                        "label" => "Камчатский край",
                        "children" =>  array(
                            array(
                                "value" => 1944,
                                "label" => "Вилючинск"
                            ),
                            array(
                                "value" => 1945,
                                "label" => "Елизово"
                            ),
                            array(
                                "value" => 218,
                                "label" => "Палана"
                            ),
                            array(
                                "value" => 44,
                                "label" => "Петропавловск-Камчатский"
                            )
                        ),
                    ),
                    array(
                        "value" => 1471,
                        "label" => "Карачаево-Черкесская Республика",
                        "children" =>  array(
                            array(
                                "value" => 1472,
                                "label" => "Карачаевск"
                            ),
                            array(
                                "value" => 1473,
                                "label" => "Теберда"
                            ),
                            array(
                                "value" => 1474,
                                "label" => "Усть-Джегута"
                            ),
                            array(
                                "value" => 46,
                                "label" => "Черкесск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1229,
                        "label" => "Кемеровская область",
                        "children" =>  array(
                            array(
                                "value" => 1230,
                                "label" => "Анжеро-Судженск"
                            ),
                            array(
                                "value" => 1231,
                                "label" => "Белово"
                            ),
                            array(
                                "value" => 1232,
                                "label" => "Березовский (Кемеровская область)"
                            ),
                            array(
                                "value" => 1233,
                                "label" => "Гурьевск (Кемеровская область)"
                            ),
                            array(
                                "value" => 1234,
                                "label" => "Калтан"
                            ),
                            array(
                                "value" => 47,
                                "label" => "Кемерово"
                            ),
                            array(
                                "value" => 1235,
                                "label" => "Киселевск"
                            ),
                            array(
                                "value" => 1236,
                                "label" => "Ленинск-Кузнецкий"
                            ),
                            array(
                                "value" => 1237,
                                "label" => "Мариинск"
                            ),
                            array(
                                "value" => 1238,
                                "label" => "Междуреченск"
                            ),
                            array(
                                "value" => 1239,
                                "label" => "Мыски"
                            ),
                            array(
                                "value" => 1240,
                                "label" => "Новокузнецк"
                            ),
                            array(
                                "value" => 1241,
                                "label" => "Осинники"
                            ),
                            array(
                                "value" => 1242,
                                "label" => "Полысаево"
                            ),
                            array(
                                "value" => 1243,
                                "label" => "Прокопьевск"
                            ),
                            array(
                                "value" => 1244,
                                "label" => "Салаир"
                            ),
                            array(
                                "value" => 1245,
                                "label" => "Тайга"
                            ),
                            array(
                                "value" => 1246,
                                "label" => "Таштагол"
                            ),
                            array(
                                "value" => 1247,
                                "label" => "Топки"
                            ),
                            array(
                                "value" => 1248,
                                "label" => "Юрга"
                            )
                        ),
                    ),
                    array(
                        "value" => 1661,
                        "label" => "Кировская область",
                        "children" =>  array(
                            array(
                                "value" => 1662,
                                "label" => "Белая Холуница"
                            ),
                            array(
                                "value" => 1663,
                                "label" => "Вятские Поляны"
                            ),
                            array(
                                "value" => 1664,
                                "label" => "Зуевка"
                            ),
                            array(
                                "value" => 49,
                                "label" => "Киров"
                            ),
                            array(
                                "value" => 1665,
                                "label" => "Кирово-Чепецк"
                            ),
                            array(
                                "value" => 1666,
                                "label" => "Кирс"
                            ),
                            array(
                                "value" => 1667,
                                "label" => "Котельнич"
                            ),
                            array(
                                "value" => 1668,
                                "label" => "Луза"
                            ),
                            array(
                                "value" => 1669,
                                "label" => "Малмыж"
                            ),
                            array(
                                "value" => 1670,
                                "label" => "Мураши"
                            ),
                            array(
                                "value" => 1671,
                                "label" => "Нолинск"
                            ),
                            array(
                                "value" => 1672,
                                "label" => "Омутнинск"
                            ),
                            array(
                                "value" => 1673,
                                "label" => "Орлов"
                            ),
                            array(
                                "value" => 1674,
                                "label" => "Слободской"
                            ),
                            array(
                                "value" => 1675,
                                "label" => "Советск (Кировская область)"
                            ),
                            array(
                                "value" => 1676,
                                "label" => "Сосновка"
                            ),
                            array(
                                "value" => 1677,
                                "label" => "Уржум"
                            ),
                            array(
                                "value" => 1678,
                                "label" => "Яранск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1771,
                        "label" => "Костромская область",
                        "children" =>  array(
                            array(
                                "value" => 1772,
                                "label" => "Буй"
                            ),
                            array(
                                "value" => 1773,
                                "label" => "Волгореченск"
                            ),
                            array(
                                "value" => 1774,
                                "label" => "Галич"
                            ),
                            array(
                                "value" => 1775,
                                "label" => "Кологрив"
                            ),
                            array(
                                "value" => 52,
                                "label" => "Кострома"
                            ),
                            array(
                                "value" => 1776,
                                "label" => "Макарьев"
                            ),
                            array(
                                "value" => 1777,
                                "label" => "Мантурово"
                            ),
                            array(
                                "value" => 1778,
                                "label" => "Нерехта"
                            ),
                            array(
                                "value" => 1779,
                                "label" => "Нея"
                            ),
                            array(
                                "value" => 1780,
                                "label" => "Солигалич"
                            ),
                            array(
                                "value" => 1781,
                                "label" => "Чухлома"
                            ),
                            array(
                                "value" => 1782,
                                "label" => "Шарья"
                            )
                        ),
                    ),
                    array(
                        "value" => 1438,
                        "label" => "Краснодарский край",
                        "children" =>  array(
                            array(
                                "value" => 1439,
                                "label" => "Абинск"
                            ),
                            array(
                                "value" => 2377,
                                "label" => "Адлер"
                            ),
                            array(
                                "value" => 1440,
                                "label" => "Анапа"
                            ),
                            array(
                                "value" => 1441,
                                "label" => "Апшеронск"
                            ),
                            array(
                                "value" => 1442,
                                "label" => "Армавир"
                            ),
                            array(
                                "value" => 2754,
                                "label" => "Архипо-Осиповка"
                            ),
                            array(
                                "value" => 2708,
                                "label" => "Афипский"
                            ),
                            array(
                                "value" => 1443,
                                "label" => "Белореченск"
                            ),
                            array(
                                "value" => 2505,
                                "label" => "Брюховецкая станица"
                            ),
                            array(
                                "value" => 2640,
                                "label" => "Выселки"
                            ),
                            array(
                                "value" => 1444,
                                "label" => "Геленджик"
                            ),
                            array(
                                "value" => 1445,
                                "label" => "Горячий Ключ"
                            ),
                            array(
                                "value" => 1446,
                                "label" => "Гулькевичи"
                            ),
                            array(
                                "value" => 2643,
                                "label" => "Дивноморское"
                            ),
                            array(
                                "value" => 2448,
                                "label" => "Динская станица"
                            ),
                            array(
                                "value" => 1447,
                                "label" => "Ейск"
                            ),
                            array(
                                "value" => 2641,
                                "label" => "Кабардинка"
                            ),
                            array(
                                "value" => 2432,
                                "label" => "Каневская"
                            ),
                            array(
                                "value" => 1448,
                                "label" => "Кореновск"
                            ),
                            array(
                                "value" => 53,
                                "label" => "Краснодар"
                            ),
                            array(
                                "value" => 1449,
                                "label" => "Кропоткин"
                            ),
                            array(
                                "value" => 2652,
                                "label" => "Крыловская станица"
                            ),
                            array(
                                "value" => 1450,
                                "label" => "Крымск"
                            ),
                            array(
                                "value" => 1451,
                                "label" => "Курганинск"
                            ),
                            array(
                                "value" => 2654,
                                "label" => "Кущевская станица"
                            ),
                            array(
                                "value" => 1452,
                                "label" => "Лабинск"
                            ),
                            array(
                                "value" => 2447,
                                "label" => "Ленинградская станица"
                            ),
                            array(
                                "value" => 2444,
                                "label" => "Мостовской"
                            ),
                            array(
                                "value" => 1453,
                                "label" => "Новокубанск"
                            ),
                            array(
                                "value" => 1454,
                                "label" => "Новороссийск"
                            ),
                            array(
                                "value" => 2689,
                                "label" => "Новотитаровская"
                            ),
                            array(
                                "value" => 2639,
                                "label" => "Павловская"
                            ),
                            array(
                                "value" => 1455,
                                "label" => "Приморско-Ахтарск"
                            ),
                            array(
                                "value" => 2658,
                                "label" => "Северская станица"
                            ),
                            array(
                                "value" => 1456,
                                "label" => "Славянск-на-Кубани"
                            ),
                            array(
                                "value" => 237,
                                "label" => "Сочи"
                            ),
                            array(
                                "value" => 2678,
                                "label" => "Старовеличковская"
                            ),
                            array(
                                "value" => 2642,
                                "label" => "Староминская"
                            ),
                            array(
                                "value" => 2694,
                                "label" => "Тбилисская"
                            ),
                            array(
                                "value" => 1457,
                                "label" => "Темрюк"
                            ),
                            array(
                                "value" => 1458,
                                "label" => "Тимашевск"
                            ),
                            array(
                                "value" => 1459,
                                "label" => "Тихорецк"
                            ),
                            array(
                                "value" => 1460,
                                "label" => "Туапсе"
                            ),
                            array(
                                "value" => 1461,
                                "label" => "Усть-Лабинск"
                            ),
                            array(
                                "value" => 1462,
                                "label" => "Хадыженск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1146,
                        "label" => "Красноярский край",
                        "children" =>  array(
                            array(
                                "value" => 1147,
                                "label" => "Артемовск (Красноярский край)"
                            ),
                            array(
                                "value" => 1148,
                                "label" => "Ачинск"
                            ),
                            array(
                                "value" => 1149,
                                "label" => "Боготол"
                            ),
                            array(
                                "value" => 2506,
                                "label" => "Богучаны"
                            ),
                            array(
                                "value" => 1150,
                                "label" => "Бородино"
                            ),
                            array(
                                "value" => 1151,
                                "label" => "Дивногорск"
                            ),
                            array(
                                "value" => 1152,
                                "label" => "Диксон"
                            ),
                            array(
                                "value" => 214,
                                "label" => "Дудинка (Красноярский край)"
                            ),
                            array(
                                "value" => 1153,
                                "label" => "Енисейск"
                            ),
                            array(
                                "value" => 1154,
                                "label" => "Железногорск (Красноярский край)"
                            ),
                            array(
                                "value" => 1155,
                                "label" => "Заозерный"
                            ),
                            array(
                                "value" => 1156,
                                "label" => "Зеленогорск"
                            ),
                            array(
                                "value" => 1157,
                                "label" => "Игарка"
                            ),
                            array(
                                "value" => 1158,
                                "label" => "Иланский"
                            ),
                            array(
                                "value" => 1159,
                                "label" => "Канск"
                            ),
                            array(
                                "value" => 1160,
                                "label" => "Кодинск"
                            ),
                            array(
                                "value" => 54,
                                "label" => "Красноярск"
                            ),
                            array(
                                "value" => 1161,
                                "label" => "Лесосибирск"
                            ),
                            array(
                                "value" => 1162,
                                "label" => "Минусинск"
                            ),
                            array(
                                "value" => 1163,
                                "label" => "Назарово"
                            ),
                            array(
                                "value" => 246,
                                "label" => "Норильск"
                            ),
                            array(
                                "value" => 1164,
                                "label" => "Сосновоборск"
                            ),
                            array(
                                "value" => 215,
                                "label" => "Тура (Красноярский край)"
                            ),
                            array(
                                "value" => 1165,
                                "label" => "Ужур"
                            ),
                            array(
                                "value" => 1166,
                                "label" => "Уяр"
                            ),
                            array(
                                "value" => 1167,
                                "label" => "Хатанга"
                            ),
                            array(
                                "value" => 1168,
                                "label" => "Шарыпово"
                            )
                        ),
                    ),
                    array(
                        "value" => 1308,
                        "label" => "Курганская область",
                        "children" =>  array(
                            array(
                                "value" => 1309,
                                "label" => "Далматово"
                            ),
                            array(
                                "value" => 2683,
                                "label" => "Каргаполье"
                            ),
                            array(
                                "value" => 1310,
                                "label" => "Катайск"
                            ),
                            array(
                                "value" => 55,
                                "label" => "Курган"
                            ),
                            array(
                                "value" => 1311,
                                "label" => "Куртамыш"
                            ),
                            array(
                                "value" => 1312,
                                "label" => "Макушино"
                            ),
                            array(
                                "value" => 2452,
                                "label" => "Медвежье озеро"
                            ),
                            array(
                                "value" => 2666,
                                "label" => "Мишкино"
                            ),
                            array(
                                "value" => 1313,
                                "label" => "Петухово"
                            ),
                            array(
                                "value" => 1314,
                                "label" => "Шадринск"
                            ),
                            array(
                                "value" => 1315,
                                "label" => "Шумиха"
                            ),
                            array(
                                "value" => 1316,
                                "label" => "Щучье"
                            ),
                            array(
                                "value" => 2672,
                                "label" => "Юргамыш"
                            )
                        ),
                    ),
                    array(
                        "value" => 1880,
                        "label" => "Курская область",
                        "children" =>  array(
                            array(
                                "value" => 1881,
                                "label" => "Дмитриев-Льговский"
                            ),
                            array(
                                "value" => 1882,
                                "label" => "Железногорск (Курская область)"
                            ),
                            array(
                                "value" => 56,
                                "label" => "Курск"
                            ),
                            array(
                                "value" => 1883,
                                "label" => "Курчатов"
                            ),
                            array(
                                "value" => 1884,
                                "label" => "Льгов"
                            ),
                            array(
                                "value" => 1885,
                                "label" => "Обоянь"
                            ),
                            array(
                                "value" => 1886,
                                "label" => "Рыльск"
                            ),
                            array(
                                "value" => 1887,
                                "label" => "Суджа"
                            ),
                            array(
                                "value" => 1888,
                                "label" => "Фатеж"
                            ),
                            array(
                                "value" => 1889,
                                "label" => "Щигры"
                            )
                        ),
                    ),
                    array(
                        "value" => 145,
                        "label" => "Ленинградская область",
                        "children" =>  array(
                            array(
                                "value" => 1988,
                                "label" => "Бокситогорск"
                            ),
                            array(
                                "value" => 1987,
                                "label" => "Волосово"
                            ),
                            array(
                                "value" => 1989,
                                "label" => "Волхов"
                            ),
                            array(
                                "value" => 1990,
                                "label" => "Всеволожск"
                            ),
                            array(
                                "value" => 1991,
                                "label" => "Выборг"
                            ),
                            array(
                                "value" => 1992,
                                "label" => "Высоцк"
                            ),
                            array(
                                "value" => 1993,
                                "label" => "Гатчина"
                            ),
                            array(
                                "value" => 2230,
                                "label" => "Зеленогорск (Ленинградская обл)"
                            ),
                            array(
                                "value" => 1994,
                                "label" => "Ивангород"
                            ),
                            array(
                                "value" => 1995,
                                "label" => "Каменногорск"
                            ),
                            array(
                                "value" => 1996,
                                "label" => "Кингисепп"
                            ),
                            array(
                                "value" => 1997,
                                "label" => "Кириши"
                            ),
                            array(
                                "value" => 1998,
                                "label" => "Кировск (Ленинградская область)"
                            ),
                            array(
                                "value" => 2554,
                                "label" => "Колпино"
                            ),
                            array(
                                "value" => 1999,
                                "label" => "Коммунар"
                            ),
                            array(
                                "value" => 2522,
                                "label" => "Красное село"
                            ),
                            array(
                                "value" => 2000,
                                "label" => "Лодейное Поле"
                            ),
                            array(
                                "value" => 2001,
                                "label" => "Ломоносов"
                            ),
                            array(
                                "value" => 2002,
                                "label" => "Луга"
                            ),
                            array(
                                "value" => 2003,
                                "label" => "Любань (Ленинградская область)"
                            ),
                            array(
                                "value" => 2004,
                                "label" => "Никольское"
                            ),
                            array(
                                "value" => 2005,
                                "label" => "Новая Ладога"
                            ),
                            array(
                                "value" => 2006,
                                "label" => "Отрадное"
                            ),
                            array(
                                "value" => 2664,
                                "label" => "Павловск (Ленинградская область)"
                            ),
                            array(
                                "value" => 2750,
                                "label" => "Петергоф"
                            ),
                            array(
                                "value" => 2007,
                                "label" => "Пикалево"
                            ),
                            array(
                                "value" => 2008,
                                "label" => "Подпорожье"
                            ),
                            array(
                                "value" => 2009,
                                "label" => "Приморск"
                            ),
                            array(
                                "value" => 2010,
                                "label" => "Приозерск"
                            ),
                            array(
                                "value" => 2490,
                                "label" => "Пушкин"
                            ),
                            array(
                                "value" => 2011,
                                "label" => "Светогорск"
                            ),
                            array(
                                "value" => 2012,
                                "label" => "Сертолово"
                            ),
                            array(
                                "value" => 2507,
                                "label" => "Сестрорецк"
                            ),
                            array(
                                "value" => 2013,
                                "label" => "Сланцы"
                            ),
                            array(
                                "value" => 2014,
                                "label" => "Сосновый Бор"
                            ),
                            array(
                                "value" => 2015,
                                "label" => "Сясьстрой"
                            ),
                            array(
                                "value" => 2016,
                                "label" => "Тихвин"
                            ),
                            array(
                                "value" => 2017,
                                "label" => "Тосно"
                            ),
                            array(
                                "value" => 2682,
                                "label" => "Ульяновка"
                            ),
                            array(
                                "value" => 2018,
                                "label" => "Шлиссельбург"
                            ),
                            array(
                                "value" => 2681,
                                "label" => "Шушары"
                            )
                        ),
                    ),
                    array(
                        "value" => 1890,
                        "label" => "Липецкая область",
                        "children" =>  array(
                            array(
                                "value" => 1891,
                                "label" => "Грязи"
                            ),
                            array(
                                "value" => 1892,
                                "label" => "Данков"
                            ),
                            array(
                                "value" => 1893,
                                "label" => "Елец"
                            ),
                            array(
                                "value" => 1894,
                                "label" => "Задонск"
                            ),
                            array(
                                "value" => 1895,
                                "label" => "Лебедянь"
                            ),
                            array(
                                "value" => 58,
                                "label" => "Липецк"
                            ),
                            array(
                                "value" => 1896,
                                "label" => "Усмань"
                            ),
                            array(
                                "value" => 1897,
                                "label" => "Чаплыгин"
                            )
                        ),
                    ),
                    array(
                        "value" => 1946,
                        "label" => "Магаданская область",
                        "children" =>  array(
                            array(
                                "value" => 60,
                                "label" => "Магадан"
                            ),
                            array(
                                "value" => 1947,
                                "label" => "Сусуман"
                            ),
                            array(
                                "value" => 2442,
                                "label" => "Эвенск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1,
                        "label" => "Москва"
                    ),
                    array(
                        "value" => 2019,
                        "label" => "Московская область",
                        "children" =>  array(
                            array(
                                "value" => 2042,
                                "label" => "Апрелевка"
                            ),
                            array(
                                "value" => 2020,
                                "label" => "Балашиха"
                            ),
                            array(
                                "value" => 2063,
                                "label" => "Бронницы"
                            ),
                            array(
                                "value" => 2043,
                                "label" => "Верея"
                            ),
                            array(
                                "value" => 2035,
                                "label" => "Видное"
                            ),
                            array(
                                "value" => 2021,
                                "label" => "Волоколамск"
                            ),
                            array(
                                "value" => 2022,
                                "label" => "Воскресенск"
                            ),
                            array(
                                "value" => 2031,
                                "label" => "Высоковск"
                            ),
                            array(
                                "value" => 2049,
                                "label" => "Голицыно"
                            ),
                            array(
                                "value" => 2100,
                                "label" => "Дедовск"
                            ),
                            array(
                                "value" => 2084,
                                "label" => "Дзержинский"
                            ),
                            array(
                                "value" => 2023,
                                "label" => "Дмитров"
                            ),
                            array(
                                "value" => 2085,
                                "label" => "Долгопрудный"
                            ),
                            array(
                                "value" => 2025,
                                "label" => "Домодедово"
                            ),
                            array(
                                "value" => 2055,
                                "label" => "Дрезна"
                            ),
                            array(
                                "value" => 2086,
                                "label" => "Дубна"
                            ),
                            array(
                                "value" => 2026,
                                "label" => "Егорьевск"
                            ),
                            array(
                                "value" => 2087,
                                "label" => "Железнодорожный"
                            ),
                            array(
                                "value" => 2064,
                                "label" => "Жуковский"
                            ),
                            array(
                                "value" => 2027,
                                "label" => "Зарайск"
                            ),
                            array(
                                "value" => 2050,
                                "label" => "Звенигород"
                            ),
                            array(
                                "value" => 2088,
                                "label" => "Зеленоград"
                            ),
                            array(
                                "value" => 2089,
                                "label" => "Ивантеевка"
                            ),
                            array(
                                "value" => 2028,
                                "label" => "Истра"
                            ),
                            array(
                                "value" => 2029,
                                "label" => "Кашира"
                            ),
                            array(
                                "value" => 2060,
                                "label" => "Климовск"
                            ),
                            array(
                                "value" => 2032,
                                "label" => "Клин"
                            ),
                            array(
                                "value" => 2486,
                                "label" => "Кокошкино"
                            ),
                            array(
                                "value" => 2033,
                                "label" => "Коломна"
                            ),
                            array(
                                "value" => 2090,
                                "label" => "Королев"
                            ),
                            array(
                                "value" => 2038,
                                "label" => "Котельники"
                            ),
                            array(
                                "value" => 2731,
                                "label" => "Красково"
                            ),
                            array(
                                "value" => 2091,
                                "label" => "Красноармейск (Московская область)"
                            ),
                            array(
                                "value" => 2034,
                                "label" => "Красногорск"
                            ),
                            array(
                                "value" => 2067,
                                "label" => "Краснозаводск"
                            ),
                            array(
                                "value" => 2051,
                                "label" => "Краснознаменск (Московская область)"
                            ),
                            array(
                                "value" => 2052,
                                "label" => "Кубинка"
                            ),
                            array(
                                "value" => 2056,
                                "label" => "Куровское"
                            ),
                            array(
                                "value" => 2057,
                                "label" => "Ликино-Дулево"
                            ),
                            array(
                                "value" => 2092,
                                "label" => "Лобня"
                            ),
                            array(
                                "value" => 2081,
                                "label" => "Лосино-Петровский"
                            ),
                            array(
                                "value" => 2037,
                                "label" => "Луховицы"
                            ),
                            array(
                                "value" => 2093,
                                "label" => "Лыткарино"
                            ),
                            array(
                                "value" => 2039,
                                "label" => "Люберцы"
                            ),
                            array(
                                "value" => 2040,
                                "label" => "Можайск"
                            ),
                            array(
                                "value" => 2441,
                                "label" => "Монино"
                            ),
                            array(
                                "value" => 2036,
                                "label" => "Московский"
                            ),
                            array(
                                "value" => 2041,
                                "label" => "Мытищи"
                            ),
                            array(
                                "value" => 2044,
                                "label" => "Наро-Фоминск"
                            ),
                            array(
                                "value" => 2634,
                                "label" => "Нахабино"
                            ),
                            array(
                                "value" => 2045,
                                "label" => "Ногинск"
                            ),
                            array(
                                "value" => 2751,
                                "label" => "Оболенск"
                            ),
                            array(
                                "value" => 2053,
                                "label" => "Одинцово"
                            ),
                            array(
                                "value" => 2030,
                                "label" => "Ожерелье"
                            ),
                            array(
                                "value" => 2054,
                                "label" => "Озеры"
                            ),
                            array(
                                "value" => 2633,
                                "label" => "Октябрьский"
                            ),
                            array(
                                "value" => 2058,
                                "label" => "Орехово-Зуево"
                            ),
                            array(
                                "value" => 2059,
                                "label" => "Павловский Посад"
                            ),
                            array(
                                "value" => 2068,
                                "label" => "Пересвет"
                            ),
                            array(
                                "value" => 2061,
                                "label" => "Подольск"
                            ),
                            array(
                                "value" => 2071,
                                "label" => "Протвино"
                            ),
                            array(
                                "value" => 2062,
                                "label" => "Пушкино"
                            ),
                            array(
                                "value" => 2072,
                                "label" => "Пущино"
                            ),
                            array(
                                "value" => 2065,
                                "label" => "Раменское"
                            ),
                            array(
                                "value" => 2094,
                                "label" => "Реутов"
                            ),
                            array(
                                "value" => 2677,
                                "label" => "Рогачево"
                            ),
                            array(
                                "value" => 2079,
                                "label" => "Рошаль"
                            ),
                            array(
                                "value" => 2066,
                                "label" => "Руза"
                            ),
                            array(
                                "value" => 2069,
                                "label" => "Сергиев Посад"
                            ),
                            array(
                                "value" => 2073,
                                "label" => "Серпухов"
                            ),
                            array(
                                "value" => 2074,
                                "label" => "Солнечногорск"
                            ),
                            array(
                                "value" => 2657,
                                "label" => "Софрино"
                            ),
                            array(
                                "value" => 2046,
                                "label" => "Старая Купавна"
                            ),
                            array(
                                "value" => 2075,
                                "label" => "Ступино"
                            ),
                            array(
                                "value" => 2076,
                                "label" => "Талдом"
                            ),
                            array(
                                "value" => 2095,
                                "label" => "Троицк (Московская область)"
                            ),
                            array(
                                "value" => 2082,
                                "label" => "Фрязино"
                            ),
                            array(
                                "value" => 2077,
                                "label" => "Химки"
                            ),
                            array(
                                "value" => 2070,
                                "label" => "Хотьково"
                            ),
                            array(
                                "value" => 2047,
                                "label" => "Черноголовка"
                            ),
                            array(
                                "value" => 2078,
                                "label" => "Чехов"
                            ),
                            array(
                                "value" => 2080,
                                "label" => "Шатура"
                            ),
                            array(
                                "value" => 2083,
                                "label" => "Щелково"
                            ),
                            array(
                                "value" => 2096,
                                "label" => "Щербинка"
                            ),
                            array(
                                "value" => 2097,
                                "label" => "Электрогорск"
                            ),
                            array(
                                "value" => 2098,
                                "label" => "Электросталь"
                            ),
                            array(
                                "value" => 2048,
                                "label" => "Электроугли"
                            ),
                            array(
                                "value" => 2099,
                                "label" => "Юбилейный"
                            ),
                            array(
                                "value" => 2024,
                                "label" => "Яхрома"
                            )
                        ),
                    ),
                    array(
                        "value" => 1061,
                        "label" => "Мурманская область",
                        "children" =>  array(
                            array(
                                "value" => 1062,
                                "label" => "Апатиты"
                            ),
                            array(
                                "value" => 1063,
                                "label" => "Гаджиево"
                            ),
                            array(
                                "value" => 1064,
                                "label" => "Заозерск"
                            ),
                            array(
                                "value" => 1065,
                                "label" => "Заполярный"
                            ),
                            array(
                                "value" => 1066,
                                "label" => "Кандалакша"
                            ),
                            array(
                                "value" => 1067,
                                "label" => "Кировск (Мурманская область)"
                            ),
                            array(
                                "value" => 1068,
                                "label" => "Ковдор"
                            ),
                            array(
                                "value" => 1069,
                                "label" => "Кола"
                            ),
                            array(
                                "value" => 1070,
                                "label" => "Мончегорск"
                            ),
                            array(
                                "value" => 64,
                                "label" => "Мурманск"
                            ),
                            array(
                                "value" => 1071,
                                "label" => "Оленегорск"
                            ),
                            array(
                                "value" => 1072,
                                "label" => "Островной"
                            ),
                            array(
                                "value" => 1073,
                                "label" => "Полярные Зори"
                            ),
                            array(
                                "value" => 1074,
                                "label" => "Полярный"
                            ),
                            array(
                                "value" => 1075,
                                "label" => "Североморск"
                            ),
                            array(
                                "value" => 1076,
                                "label" => "Снежногорск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1985,
                        "label" => "Ненецкий АО",
                        "children" =>  array(
                            array(
                                "value" => 1986,
                                "label" => "Нарьян-Мар"
                            )
                        ),
                    ),
                    array(
                        "value" => 1679,
                        "label" => "Нижегородская область",
                        "children" =>  array(
                            array(
                                "value" => 248,
                                "label" => "Арзамас"
                            ),
                            array(
                                "value" => 1680,
                                "label" => "Балахна"
                            ),
                            array(
                                "value" => 1681,
                                "label" => "Богородск"
                            ),
                            array(
                                "value" => 1682,
                                "label" => "Бор"
                            ),
                            array(
                                "value" => 1683,
                                "label" => "Ветлуга"
                            ),
                            array(
                                "value" => 1684,
                                "label" => "Володарск"
                            ),
                            array(
                                "value" => 1685,
                                "label" => "Ворсма"
                            ),
                            array(
                                "value" => 1686,
                                "label" => "Выкса"
                            ),
                            array(
                                "value" => 1687,
                                "label" => "Горбатов"
                            ),
                            array(
                                "value" => 1688,
                                "label" => "Городец"
                            ),
                            array(
                                "value" => 247,
                                "label" => "Дзержинск (Нижегородская область)"
                            ),
                            array(
                                "value" => 2439,
                                "label" => "Дивеево"
                            ),
                            array(
                                "value" => 1689,
                                "label" => "Заволжье"
                            ),
                            array(
                                "value" => 1690,
                                "label" => "Княгинино"
                            ),
                            array(
                                "value" => 1691,
                                "label" => "Кстово"
                            ),
                            array(
                                "value" => 1692,
                                "label" => "Кулебаки"
                            ),
                            array(
                                "value" => 1693,
                                "label" => "Лукоянов"
                            ),
                            array(
                                "value" => 1694,
                                "label" => "Лысково"
                            ),
                            array(
                                "value" => 1695,
                                "label" => "Навашино"
                            ),
                            array(
                                "value" => 66,
                                "label" => "Нижний Новгород"
                            ),
                            array(
                                "value" => 1696,
                                "label" => "Павлово"
                            ),
                            array(
                                "value" => 1697,
                                "label" => "Первомайск (Нижегородская область)"
                            ),
                            array(
                                "value" => 1698,
                                "label" => "Перевоз"
                            ),
                            array(
                                "value" => 249,
                                "label" => "Саров"
                            ),
                            array(
                                "value" => 1699,
                                "label" => "Семенов"
                            ),
                            array(
                                "value" => 1700,
                                "label" => "Сергач"
                            ),
                            array(
                                "value" => 1701,
                                "label" => "Урень"
                            ),
                            array(
                                "value" => 1702,
                                "label" => "Чкаловск"
                            ),
                            array(
                                "value" => 1703,
                                "label" => "Шахунья"
                            )
                        ),
                    ),
                    array(
                        "value" => 1051,
                        "label" => "Новгородская область",
                        "children" =>  array(
                            array(
                                "value" => 1052,
                                "label" => "Боровичи"
                            ),
                            array(
                                "value" => 1053,
                                "label" => "Валдай"
                            ),
                            array(
                                "value" => 67,
                                "label" => "Великий Новгород"
                            ),
                            array(
                                "value" => 1054,
                                "label" => "Малая Вишера"
                            ),
                            array(
                                "value" => 1055,
                                "label" => "Окуловка"
                            ),
                            array(
                                "value" => 1056,
                                "label" => "Пестово"
                            ),
                            array(
                                "value" => 1057,
                                "label" => "Сольцы"
                            ),
                            array(
                                "value" => 1058,
                                "label" => "Старая Русса"
                            ),
                            array(
                                "value" => 1059,
                                "label" => "Холм"
                            ),
                            array(
                                "value" => 1060,
                                "label" => "Чудово"
                            )
                        ),
                    ),
                    array(
                        "value" => 1202,
                        "label" => "Новосибирская область",
                        "children" =>  array(
                            array(
                                "value" => 1203,
                                "label" => "Барабинск"
                            ),
                            array(
                                "value" => 1204,
                                "label" => "Бердск"
                            ),
                            array(
                                "value" => 1205,
                                "label" => "Болотное"
                            ),
                            array(
                                "value" => 2665,
                                "label" => "Довольное"
                            ),
                            array(
                                "value" => 1206,
                                "label" => "Искитим"
                            ),
                            array(
                                "value" => 1207,
                                "label" => "Карасук"
                            ),
                            array(
                                "value" => 1208,
                                "label" => "Каргат"
                            ),
                            array(
                                "value" => 1209,
                                "label" => "Куйбышев"
                            ),
                            array(
                                "value" => 1210,
                                "label" => "Купино"
                            ),
                            array(
                                "value" => 4,
                                "label" => "Новосибирск"
                            ),
                            array(
                                "value" => 1211,
                                "label" => "Обь"
                            ),
                            array(
                                "value" => 1212,
                                "label" => "Татарск"
                            ),
                            array(
                                "value" => 1213,
                                "label" => "Тогучин"
                            ),
                            array(
                                "value" => 2512,
                                "label" => "Чаны"
                            ),
                            array(
                                "value" => 1214,
                                "label" => "Черепаново"
                            ),
                            array(
                                "value" => 1215,
                                "label" => "Чулым"
                            )
                        ),
                    ),
                    array(
                        "value" => 1249,
                        "label" => "Омская область",
                        "children" =>  array(
                            array(
                                "value" => 1250,
                                "label" => "Исилькуль"
                            ),
                            array(
                                "value" => 1251,
                                "label" => "Калачинск"
                            ),
                            array(
                                "value" => 1252,
                                "label" => "Называевск"
                            ),
                            array(
                                "value" => 68,
                                "label" => "Омск"
                            ),
                            array(
                                "value" => 1253,
                                "label" => "Тара"
                            ),
                            array(
                                "value" => 1254,
                                "label" => "Тюкалинск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1563,
                        "label" => "Оренбургская область",
                        "children" =>  array(
                            array(
                                "value" => 1564,
                                "label" => "Абдулино"
                            ),
                            array(
                                "value" => 1565,
                                "label" => "Бугуруслан"
                            ),
                            array(
                                "value" => 1566,
                                "label" => "Бузулук"
                            ),
                            array(
                                "value" => 1567,
                                "label" => "Гай"
                            ),
                            array(
                                "value" => 1568,
                                "label" => "Кувандык"
                            ),
                            array(
                                "value" => 1569,
                                "label" => "Медногорск"
                            ),
                            array(
                                "value" => 1570,
                                "label" => "Новотроицк"
                            ),
                            array(
                                "value" => 70,
                                "label" => "Оренбург"
                            ),
                            array(
                                "value" => 1571,
                                "label" => "Орск"
                            ),
                            array(
                                "value" => 1572,
                                "label" => "Соль-Илецк"
                            ),
                            array(
                                "value" => 1573,
                                "label" => "Сорочинск"
                            ),
                            array(
                                "value" => 1574,
                                "label" => "Ясный"
                            )
                        ),
                    ),
                    array(
                        "value" => 1898,
                        "label" => "Орловская область",
                        "children" =>  array(
                            array(
                                "value" => 1899,
                                "label" => "Болхов"
                            ),
                            array(
                                "value" => 1900,
                                "label" => "Дмитровск"
                            ),
                            array(
                                "value" => 2757,
                                "label" => "Колпна"
                            ),
                            array(
                                "value" => 1901,
                                "label" => "Ливны"
                            ),
                            array(
                                "value" => 1902,
                                "label" => "Малоархангельск"
                            ),
                            array(
                                "value" => 1903,
                                "label" => "Мценск"
                            ),
                            array(
                                "value" => 2697,
                                "label" => "Нарышкино"
                            ),
                            array(
                                "value" => 1904,
                                "label" => "Новосиль"
                            ),
                            array(
                                "value" => 69,
                                "label" => "Орел"
                            )
                        ),
                    ),
                    array(
                        "value" => 1575,
                        "label" => "Пензенская область",
                        "children" =>  array(
                            array(
                                "value" => 1576,
                                "label" => "Белинский"
                            ),
                            array(
                                "value" => 1577,
                                "label" => "Городище"
                            ),
                            array(
                                "value" => 1578,
                                "label" => "Заречный (Пензенская область)"
                            ),
                            array(
                                "value" => 1579,
                                "label" => "Каменка (Пензенская область)"
                            ),
                            array(
                                "value" => 1580,
                                "label" => "Кузнецк"
                            ),
                            array(
                                "value" => 1581,
                                "label" => "Нижний Ломов"
                            ),
                            array(
                                "value" => 1582,
                                "label" => "Никольск (Пензенская область)"
                            ),
                            array(
                                "value" => 71,
                                "label" => "Пенза"
                            ),
                            array(
                                "value" => 1583,
                                "label" => "Сердобск"
                            ),
                            array(
                                "value" => 1584,
                                "label" => "Спасск"
                            ),
                            array(
                                "value" => 1585,
                                "label" => "Сурск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1317,
                        "label" => "Пермский край",
                        "children" =>  array(
                            array(
                                "value" => 1318,
                                "label" => "Александровск"
                            ),
                            array(
                                "value" => 2684,
                                "label" => "Барда (Пермский край)"
                            ),
                            array(
                                "value" => 1319,
                                "label" => "Березники"
                            ),
                            array(
                                "value" => 1320,
                                "label" => "Верещагино"
                            ),
                            array(
                                "value" => 1321,
                                "label" => "Горнозаводск"
                            ),
                            array(
                                "value" => 1322,
                                "label" => "Гремячинск"
                            ),
                            array(
                                "value" => 1323,
                                "label" => "Губаха"
                            ),
                            array(
                                "value" => 1324,
                                "label" => "Добрянка"
                            ),
                            array(
                                "value" => 1325,
                                "label" => "Кизел"
                            ),
                            array(
                                "value" => 1326,
                                "label" => "Красновишерск"
                            ),
                            array(
                                "value" => 1327,
                                "label" => "Краснокамск"
                            ),
                            array(
                                "value" => 1328,
                                "label" => "Кудымкар"
                            ),
                            array(
                                "value" => 1329,
                                "label" => "Кунгур"
                            ),
                            array(
                                "value" => 1330,
                                "label" => "Лысьва"
                            ),
                            array(
                                "value" => 1331,
                                "label" => "Нытва"
                            ),
                            array(
                                "value" => 1332,
                                "label" => "Оса"
                            ),
                            array(
                                "value" => 1333,
                                "label" => "Оханск"
                            ),
                            array(
                                "value" => 1334,
                                "label" => "Очер"
                            ),
                            array(
                                "value" => 72,
                                "label" => "Пермь"
                            ),
                            array(
                                "value" => 1335,
                                "label" => "Соликамск"
                            ),
                            array(
                                "value" => 2732,
                                "label" => "Суксун"
                            ),
                            array(
                                "value" => 1336,
                                "label" => "Усолье"
                            ),
                            array(
                                "value" => 1337,
                                "label" => "Чайковский"
                            ),
                            array(
                                "value" => 1338,
                                "label" => "Чердынь"
                            ),
                            array(
                                "value" => 1339,
                                "label" => "Чермоз"
                            ),
                            array(
                                "value" => 1340,
                                "label" => "Чернушка"
                            ),
                            array(
                                "value" => 1341,
                                "label" => "Чусовой"
                            )
                        ),
                    ),
                    array(
                        "value" => 1948,
                        "label" => "Приморский край",
                        "children" =>  array(
                            array(
                                "value" => 1949,
                                "label" => "Арсеньев"
                            ),
                            array(
                                "value" => 1950,
                                "label" => "Артем"
                            ),
                            array(
                                "value" => 1951,
                                "label" => "Большой Камень"
                            ),
                            array(
                                "value" => 22,
                                "label" => "Владивосток"
                            ),
                            array(
                                "value" => 1952,
                                "label" => "Дальнегорск"
                            ),
                            array(
                                "value" => 1953,
                                "label" => "Дальнереченск"
                            ),
                            array(
                                "value" => 1954,
                                "label" => "Лесозаводск"
                            ),
                            array(
                                "value" => 1955,
                                "label" => "Находка"
                            ),
                            array(
                                "value" => 1956,
                                "label" => "Партизанск"
                            ),
                            array(
                                "value" => 2450,
                                "label" => "Пластун"
                            ),
                            array(
                                "value" => 1957,
                                "label" => "Спасск-Дальний"
                            ),
                            array(
                                "value" => 1958,
                                "label" => "Уссурийск"
                            ),
                            array(
                                "value" => 1959,
                                "label" => "Фокино (Приморский край)"
                            )
                        ),
                    ),
                    array(
                        "value" => 1090,
                        "label" => "Псковская область",
                        "children" =>  array(
                            array(
                                "value" => 1091,
                                "label" => "Великие Луки"
                            ),
                            array(
                                "value" => 1092,
                                "label" => "Гдов"
                            ),
                            array(
                                "value" => 1093,
                                "label" => "Дно"
                            ),
                            array(
                                "value" => 1094,
                                "label" => "Невель"
                            ),
                            array(
                                "value" => 1095,
                                "label" => "Новоржев"
                            ),
                            array(
                                "value" => 1096,
                                "label" => "Новосокольники"
                            ),
                            array(
                                "value" => 1097,
                                "label" => "Опочка"
                            ),
                            array(
                                "value" => 1098,
                                "label" => "Остров"
                            ),
                            array(
                                "value" => 1099,
                                "label" => "Печоры"
                            ),
                            array(
                                "value" => 1100,
                                "label" => "Порхов"
                            ),
                            array(
                                "value" => 75,
                                "label" => "Псков"
                            ),
                            array(
                                "value" => 1101,
                                "label" => "Пустошка"
                            ),
                            array(
                                "value" => 1102,
                                "label" => "Пыталово"
                            ),
                            array(
                                "value" => 2756,
                                "label" => "Себеж"
                            )
                        ),
                    ),
                    array(
                        "value" => 1422,
                        "label" => "Республика Адыгея",
                        "children" =>  array(
                            array(
                                "value" => 1423,
                                "label" => "Адыгейск"
                            ),
                            array(
                                "value" => 8,
                                "label" => "Майкоп"
                            ),
                            array(
                                "value" => 2753,
                                "label" => "Энем"
                            )
                        ),
                    ),
                    array(
                        "value" => 1216,
                        "label" => "Республика Алтай",
                        "children" =>  array(
                            array(
                                "value" => 10,
                                "label" => "Горно-Алтайск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1347,
                        "label" => "Республика Башкортостан",
                        "children" =>  array(
                            array(
                                "value" => 1348,
                                "label" => "Агидель"
                            ),
                            array(
                                "value" => 1349,
                                "label" => "Баймак"
                            ),
                            array(
                                "value" => 1350,
                                "label" => "Белебей"
                            ),
                            array(
                                "value" => 1351,
                                "label" => "Белорецк"
                            ),
                            array(
                                "value" => 2670,
                                "label" => "Бижбуляк"
                            ),
                            array(
                                "value" => 1352,
                                "label" => "Бирск"
                            ),
                            array(
                                "value" => 1353,
                                "label" => "Благовещенск (Республика Башкортостан)"
                            ),
                            array(
                                "value" => 1354,
                                "label" => "Давлеканово"
                            ),
                            array(
                                "value" => 1355,
                                "label" => "Дюртюли"
                            ),
                            array(
                                "value" => 1356,
                                "label" => "Ишимбай"
                            ),
                            array(
                                "value" => 1357,
                                "label" => "Кумертау"
                            ),
                            array(
                                "value" => 1358,
                                "label" => "Межгорье"
                            ),
                            array(
                                "value" => 1359,
                                "label" => "Мелеуз"
                            ),
                            array(
                                "value" => 1360,
                                "label" => "Нефтекамск"
                            ),
                            array(
                                "value" => 1361,
                                "label" => "Октябрьский (Республика Башкортостан)"
                            ),
                            array(
                                "value" => 2680,
                                "label" => "Приютово"
                            ),
                            array(
                                "value" => 1362,
                                "label" => "Салават"
                            ),
                            array(
                                "value" => 1363,
                                "label" => "Сибай"
                            ),
                            array(
                                "value" => 1364,
                                "label" => "Стерлитамак"
                            ),
                            array(
                                "value" => 1365,
                                "label" => "Туймазы"
                            ),
                            array(
                                "value" => 99,
                                "label" => "Уфа"
                            ),
                            array(
                                "value" => 1366,
                                "label" => "Учалы"
                            ),
                            array(
                                "value" => 2645,
                                "label" => "Чекмагуш"
                            ),
                            array(
                                "value" => 2679,
                                "label" => "Чишмы"
                            ),
                            array(
                                "value" => 1367,
                                "label" => "Янаул"
                            )
                        ),
                    ),
                    array(
                        "value" => 1118,
                        "label" => "Республика Бурятия",
                        "children" =>  array(
                            array(
                                "value" => 1119,
                                "label" => "Бабушкин"
                            ),
                            array(
                                "value" => 1120,
                                "label" => "Гусиноозерск"
                            ),
                            array(
                                "value" => 1121,
                                "label" => "Закаменск"
                            ),
                            array(
                                "value" => 1122,
                                "label" => "Кяхта"
                            ),
                            array(
                                "value" => 1123,
                                "label" => "Северобайкальск"
                            ),
                            array(
                                "value" => 2648,
                                "label" => "Таксимо"
                            ),
                            array(
                                "value" => 20,
                                "label" => "Улан-Удэ"
                            )
                        ),
                    ),
                    array(
                        "value" => 1424,
                        "label" => "Республика Дагестан",
                        "children" =>  array(
                            array(
                                "value" => 1425,
                                "label" => "Буйнакск"
                            ),
                            array(
                                "value" => 1426,
                                "label" => "Дагестанские Огни"
                            ),
                            array(
                                "value" => 1427,
                                "label" => "Дербент"
                            ),
                            array(
                                "value" => 1428,
                                "label" => "Избербаш"
                            ),
                            array(
                                "value" => 1429,
                                "label" => "Каспийск"
                            ),
                            array(
                                "value" => 1430,
                                "label" => "Кизилюрт"
                            ),
                            array(
                                "value" => 1431,
                                "label" => "Кизляр"
                            ),
                            array(
                                "value" => 29,
                                "label" => "Махачкала"
                            ),
                            array(
                                "value" => 1432,
                                "label" => "Хасавюрт"
                            ),
                            array(
                                "value" => 1433,
                                "label" => "Южно-Сухокумск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1434,
                        "label" => "Республика Ингушетия",
                        "children" =>  array(
                            array(
                                "value" => 1435,
                                "label" => "Карабулак"
                            ),
                            array(
                                "value" => 34,
                                "label" => "Магас"
                            ),
                            array(
                                "value" => 1436,
                                "label" => "Малгобек"
                            ),
                            array(
                                "value" => 1437,
                                "label" => "Назрань"
                            )
                        ),
                    ),
                    array(
                        "value" => 1553,
                        "label" => "Республика Калмыкия",
                        "children" =>  array(
                            array(
                                "value" => 1554,
                                "label" => "Городовиковск"
                            ),
                            array(
                                "value" => 1555,
                                "label" => "Лагань"
                            ),
                            array(
                                "value" => 42,
                                "label" => "Элиста"
                            )
                        ),
                    ),
                    array(
                        "value" => 1077,
                        "label" => "Республика Карелия",
                        "children" =>  array(
                            array(
                                "value" => 1078,
                                "label" => "Беломорск"
                            ),
                            array(
                                "value" => 1079,
                                "label" => "Кемь"
                            ),
                            array(
                                "value" => 1080,
                                "label" => "Кондопога"
                            ),
                            array(
                                "value" => 1081,
                                "label" => "Костомукша"
                            ),
                            array(
                                "value" => 1082,
                                "label" => "Лахденпохья"
                            ),
                            array(
                                "value" => 1083,
                                "label" => "Медвежьегорск"
                            ),
                            array(
                                "value" => 1084,
                                "label" => "Олонец"
                            ),
                            array(
                                "value" => 73,
                                "label" => "Петрозаводск"
                            ),
                            array(
                                "value" => 1085,
                                "label" => "Питкяранта"
                            ),
                            array(
                                "value" => 1086,
                                "label" => "Пудож"
                            ),
                            array(
                                "value" => 1087,
                                "label" => "Сегежа"
                            ),
                            array(
                                "value" => 1088,
                                "label" => "Сортавала"
                            ),
                            array(
                                "value" => 1089,
                                "label" => "Суоярви"
                            )
                        ),
                    ),
                    array(
                        "value" => 1041,
                        "label" => "Республика Коми",
                        "children" =>  array(
                            array(
                                "value" => 1042,
                                "label" => "Воркута"
                            ),
                            array(
                                "value" => 1043,
                                "label" => "Вуктыл"
                            ),
                            array(
                                "value" => 1044,
                                "label" => "Емва"
                            ),
                            array(
                                "value" => 1045,
                                "label" => "Инта"
                            ),
                            array(
                                "value" => 1046,
                                "label" => "Микунь"
                            ),
                            array(
                                "value" => 1047,
                                "label" => "Печора"
                            ),
                            array(
                                "value" => 1048,
                                "label" => "Сосногорск"
                            ),
                            array(
                                "value" => 51,
                                "label" => "Сыктывкар"
                            ),
                            array(
                                "value" => 1049,
                                "label" => "Усинск"
                            ),
                            array(
                                "value" => 1050,
                                "label" => "Ухта"
                            )
                        ),
                    ),
                    array(
                        "value" => 1620,
                        "label" => "Республика Марий Эл",
                        "children" =>  array(
                            array(
                                "value" => 1621,
                                "label" => "Волжск"
                            ),
                            array(
                                "value" => 1622,
                                "label" => "Звенигово"
                            ),
                            array(
                                "value" => 61,
                                "label" => "Йошкар-Ола"
                            ),
                            array(
                                "value" => 1623,
                                "label" => "Козьмодемьянск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1556,
                        "label" => "Республика Мордовия",
                        "children" =>  array(
                            array(
                                "value" => 1557,
                                "label" => "Ардатов"
                            ),
                            array(
                                "value" => 2667,
                                "label" => "Атяшево"
                            ),
                            array(
                                "value" => 1558,
                                "label" => "Инсар"
                            ),
                            array(
                                "value" => 1559,
                                "label" => "Ковылкино"
                            ),
                            array(
                                "value" => 1560,
                                "label" => "Краснослободск (Республика Мордовия)"
                            ),
                            array(
                                "value" => 1561,
                                "label" => "Рузаевка"
                            ),
                            array(
                                "value" => 63,
                                "label" => "Саранск"
                            ),
                            array(
                                "value" => 1562,
                                "label" => "Темников"
                            )
                        ),
                    ),
                    array(
                        "value" => 1174,
                        "label" => "Республика Саха (Якутия)",
                        "children" =>  array(
                            array(
                                "value" => 1175,
                                "label" => "Алдан"
                            ),
                            array(
                                "value" => 1176,
                                "label" => "Верхоянск"
                            ),
                            array(
                                "value" => 1177,
                                "label" => "Вилюйск"
                            ),
                            array(
                                "value" => 1178,
                                "label" => "Ленск"
                            ),
                            array(
                                "value" => 1179,
                                "label" => "Мирный (Республика Саха (Якутия))"
                            ),
                            array(
                                "value" => 1180,
                                "label" => "Нерюнгри"
                            ),
                            array(
                                "value" => 1181,
                                "label" => "Нюрба"
                            ),
                            array(
                                "value" => 1182,
                                "label" => "Олекминск"
                            ),
                            array(
                                "value" => 1183,
                                "label" => "Покровск"
                            ),
                            array(
                                "value" => 1184,
                                "label" => "Среднеколымск"
                            ),
                            array(
                                "value" => 1185,
                                "label" => "Томмот"
                            ),
                            array(
                                "value" => 1186,
                                "label" => "Удачный"
                            ),
                            array(
                                "value" => 80,
                                "label" => "Якутск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1475,
                        "label" => "Республика Северная Осетия-Алания",
                        "children" =>  array(
                            array(
                                "value" => 1476,
                                "label" => "Алагир"
                            ),
                            array(
                                "value" => 1477,
                                "label" => "Ардон"
                            ),
                            array(
                                "value" => 1478,
                                "label" => "Беслан"
                            ),
                            array(
                                "value" => 82,
                                "label" => "Владикавказ"
                            ),
                            array(
                                "value" => 1479,
                                "label" => "Дигора"
                            ),
                            array(
                                "value" => 1480,
                                "label" => "Моздок"
                            )
                        ),
                    ),
                    array(
                        "value" => 1624,
                        "label" => "Республика Татарстан",
                        "children" =>  array(
                            array(
                                "value" => 1625,
                                "label" => "Агрыз"
                            ),
                            array(
                                "value" => 1626,
                                "label" => "Азнакаево"
                            ),
                            array(
                                "value" => 2695,
                                "label" => "Алексеевское"
                            ),
                            array(
                                "value" => 1627,
                                "label" => "Альметьевск"
                            ),
                            array(
                                "value" => 2727,
                                "label" => "Апастово"
                            ),
                            array(
                                "value" => 1628,
                                "label" => "Арск"
                            ),
                            array(
                                "value" => 1629,
                                "label" => "Бавлы"
                            ),
                            array(
                                "value" => 2449,
                                "label" => "Балтаси"
                            ),
                            array(
                                "value" => 1630,
                                "label" => "Болгар"
                            ),
                            array(
                                "value" => 1631,
                                "label" => "Бугульма"
                            ),
                            array(
                                "value" => 1632,
                                "label" => "Буинск"
                            ),
                            array(
                                "value" => 1633,
                                "label" => "Елабуга"
                            ),
                            array(
                                "value" => 1634,
                                "label" => "Заинск"
                            ),
                            array(
                                "value" => 1635,
                                "label" => "Зеленодольск"
                            ),
                            array(
                                "value" => 2734,
                                "label" => "Иннополис"
                            ),
                            array(
                                "value" => 88,
                                "label" => "Казань"
                            ),
                            array(
                                "value" => 2726,
                                "label" => "Камское Устье"
                            ),
                            array(
                                "value" => 2628,
                                "label" => "Кукмор"
                            ),
                            array(
                                "value" => 1636,
                                "label" => "Лаишево"
                            ),
                            array(
                                "value" => 1637,
                                "label" => "Лениногорск"
                            ),
                            array(
                                "value" => 1638,
                                "label" => "Мамадыш"
                            ),
                            array(
                                "value" => 1639,
                                "label" => "Менделеевск"
                            ),
                            array(
                                "value" => 1640,
                                "label" => "Мензелинск"
                            ),
                            array(
                                "value" => 1641,
                                "label" => "Набережные Челны"
                            ),
                            array(
                                "value" => 1642,
                                "label" => "Нижнекамск"
                            ),
                            array(
                                "value" => 1643,
                                "label" => "Нурлат"
                            ),
                            array(
                                "value" => 2725,
                                "label" => "Пестрецы"
                            ),
                            array(
                                "value" => 1644,
                                "label" => "Тетюши"
                            ),
                            array(
                                "value" => 1645,
                                "label" => "Чистополь"
                            )
                        ),
                    ),
                    array(
                        "value" => 1169,
                        "label" => "Республика Тыва",
                        "children" =>  array(
                            array(
                                "value" => 1170,
                                "label" => "Ак-Довурак"
                            ),
                            array(
                                "value" => 91,
                                "label" => "Кызыл"
                            ),
                            array(
                                "value" => 1171,
                                "label" => "Туран"
                            ),
                            array(
                                "value" => 1172,
                                "label" => "Чадан"
                            ),
                            array(
                                "value" => 1173,
                                "label" => "Шагонар"
                            )
                        ),
                    ),
                    array(
                        "value" => 1187,
                        "label" => "Республика Хакасия",
                        "children" =>  array(
                            array(
                                "value" => 1188,
                                "label" => "Абаза"
                            ),
                            array(
                                "value" => 103,
                                "label" => "Абакан"
                            ),
                            array(
                                "value" => 1189,
                                "label" => "Саяногорск"
                            ),
                            array(
                                "value" => 1190,
                                "label" => "Сорск"
                            ),
                            array(
                                "value" => 1191,
                                "label" => "Черногорск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1530,
                        "label" => "Ростовская область",
                        "children" =>  array(
                            array(
                                "value" => 1531,
                                "label" => "Азов"
                            ),
                            array(
                                "value" => 1532,
                                "label" => "Аксай (Ростовская область)"
                            ),
                            array(
                                "value" => 1533,
                                "label" => "Батайск"
                            ),
                            array(
                                "value" => 1534,
                                "label" => "Белая Калитва"
                            ),
                            array(
                                "value" => 1535,
                                "label" => "Волгодонск"
                            ),
                            array(
                                "value" => 1536,
                                "label" => "Гуково"
                            ),
                            array(
                                "value" => 1537,
                                "label" => "Донецк (Ростовская область)"
                            ),
                            array(
                                "value" => 1538,
                                "label" => "Зверево"
                            ),
                            array(
                                "value" => 1539,
                                "label" => "Зерноград"
                            ),
                            array(
                                "value" => 1540,
                                "label" => "Каменск-Шахтинский"
                            ),
                            array(
                                "value" => 1541,
                                "label" => "Константиновск"
                            ),
                            array(
                                "value" => 1542,
                                "label" => "Красный Сулин"
                            ),
                            array(
                                "value" => 1543,
                                "label" => "Миллерово"
                            ),
                            array(
                                "value" => 1544,
                                "label" => "Морозовск"
                            ),
                            array(
                                "value" => 1545,
                                "label" => "Новочеркасск"
                            ),
                            array(
                                "value" => 1546,
                                "label" => "Новошахтинск"
                            ),
                            array(
                                "value" => 2638,
                                "label" => "Орловский"
                            ),
                            array(
                                "value" => 1547,
                                "label" => "Пролетарск"
                            ),
                            array(
                                "value" => 76,
                                "label" => "Ростов-на-Дону"
                            ),
                            array(
                                "value" => 1548,
                                "label" => "Сальск"
                            ),
                            array(
                                "value" => 1549,
                                "label" => "Семикаракорск"
                            ),
                            array(
                                "value" => 1550,
                                "label" => "Таганрог"
                            ),
                            array(
                                "value" => 1551,
                                "label" => "Цимлянск"
                            ),
                            array(
                                "value" => 1552,
                                "label" => "Шахты"
                            )
                        ),
                    ),
                    array(
                        "value" => 1704,
                        "label" => "Рязанская область",
                        "children" =>  array(
                            array(
                                "value" => 1705,
                                "label" => "Касимов"
                            ),
                            array(
                                "value" => 1706,
                                "label" => "Кораблино"
                            ),
                            array(
                                "value" => 1707,
                                "label" => "Михайлов"
                            ),
                            array(
                                "value" => 1708,
                                "label" => "Новомичуринск"
                            ),
                            array(
                                "value" => 1709,
                                "label" => "Рыбное"
                            ),
                            array(
                                "value" => 1710,
                                "label" => "Ряжск"
                            ),
                            array(
                                "value" => 77,
                                "label" => "Рязань"
                            ),
                            array(
                                "value" => 1711,
                                "label" => "Сасово"
                            ),
                            array(
                                "value" => 1712,
                                "label" => "Скопин"
                            ),
                            array(
                                "value" => 1713,
                                "label" => "Спас-Клепики"
                            ),
                            array(
                                "value" => 1714,
                                "label" => "Спасск-Рязанский"
                            ),
                            array(
                                "value" => 1715,
                                "label" => "Шацк"
                            )
                        ),
                    ),
                    array(
                        "value" => 1586,
                        "label" => "Самарская область",
                        "children" =>  array(
                            array(
                                "value" => 1587,
                                "label" => "Жигулевск"
                            ),
                            array(
                                "value" => 1588,
                                "label" => "Кинель"
                            ),
                            array(
                                "value" => 2521,
                                "label" => "Кинель-Черкассы"
                            ),
                            array(
                                "value" => 1589,
                                "label" => "Нефтегорск"
                            ),
                            array(
                                "value" => 1590,
                                "label" => "Новокуйбышевск"
                            ),
                            array(
                                "value" => 1591,
                                "label" => "Октябрьск"
                            ),
                            array(
                                "value" => 1592,
                                "label" => "Отрадный"
                            ),
                            array(
                                "value" => 1593,
                                "label" => "Похвистнево"
                            ),
                            array(
                                "value" => 78,
                                "label" => "Самара"
                            ),
                            array(
                                "value" => 1594,
                                "label" => "Сызрань"
                            ),
                            array(
                                "value" => 212,
                                "label" => "Тольятти"
                            ),
                            array(
                                "value" => 1595,
                                "label" => "Чапаевск"
                            )
                        ),
                    ),
                    array(
                        "value" => 2,
                        "label" => "Санкт-Петербург"
                    ),
                    array(
                        "value" => 1596,
                        "label" => "Саратовская область",
                        "children" =>  array(
                            array(
                                "value" => 1597,
                                "label" => "Аркадак"
                            ),
                            array(
                                "value" => 1598,
                                "label" => "Аткарск"
                            ),
                            array(
                                "value" => 2707,
                                "label" => "Базарный Карабулак"
                            ),
                            array(
                                "value" => 1599,
                                "label" => "Балаково"
                            ),
                            array(
                                "value" => 1600,
                                "label" => "Балашов"
                            ),
                            array(
                                "value" => 1601,
                                "label" => "Вольск"
                            ),
                            array(
                                "value" => 1602,
                                "label" => "Ершов"
                            ),
                            array(
                                "value" => 1603,
                                "label" => "Калининск"
                            ),
                            array(
                                "value" => 1604,
                                "label" => "Красноармейск (Саратовская область)"
                            ),
                            array(
                                "value" => 1605,
                                "label" => "Красный Кут"
                            ),
                            array(
                                "value" => 1606,
                                "label" => "Маркс"
                            ),
                            array(
                                "value" => 1607,
                                "label" => "Новоузенск"
                            ),
                            array(
                                "value" => 1608,
                                "label" => "Петровск"
                            ),
                            array(
                                "value" => 2736,
                                "label" => "Приволжский"
                            ),
                            array(
                                "value" => 1609,
                                "label" => "Пугачев"
                            ),
                            array(
                                "value" => 1610,
                                "label" => "Ртищево"
                            ),
                            array(
                                "value" => 79,
                                "label" => "Саратов"
                            ),
                            array(
                                "value" => 1611,
                                "label" => "Хвалынск"
                            ),
                            array(
                                "value" => 1612,
                                "label" => "Шиханы"
                            ),
                            array(
                                "value" => 1613,
                                "label" => "Энгельс"
                            )
                        ),
                    ),
                    array(
                        "value" => 1960,
                        "label" => "Сахалинская область",
                        "children" =>  array(
                            array(
                                "value" => 1961,
                                "label" => "Александровск-Сахалинский"
                            ),
                            array(
                                "value" => 1962,
                                "label" => "Анива"
                            ),
                            array(
                                "value" => 1963,
                                "label" => "Долинск"
                            ),
                            array(
                                "value" => 1964,
                                "label" => "Корсаков"
                            ),
                            array(
                                "value" => 1965,
                                "label" => "Курильск"
                            ),
                            array(
                                "value" => 1966,
                                "label" => "Макаров"
                            ),
                            array(
                                "value" => 1967,
                                "label" => "Невельск"
                            ),
                            array(
                                "value" => 2451,
                                "label" => "Ноглики"
                            ),
                            array(
                                "value" => 1968,
                                "label" => "Оха"
                            ),
                            array(
                                "value" => 1969,
                                "label" => "Поронайск"
                            ),
                            array(
                                "value" => 1970,
                                "label" => "Северо-Курильск"
                            ),
                            array(
                                "value" => 1971,
                                "label" => "Томари"
                            ),
                            array(
                                "value" => 1972,
                                "label" => "Углегорск"
                            ),
                            array(
                                "value" => 1973,
                                "label" => "Холмск"
                            ),
                            array(
                                "value" => 1974,
                                "label" => "Шахтерск (Сахалинская область)"
                            ),
                            array(
                                "value" => 2649,
                                "label" => "Южно-Курильск"
                            ),
                            array(
                                "value" => 81,
                                "label" => "Южно-Сахалинск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1261,
                        "label" => "Свердловская область",
                        "children" =>  array(
                            array(
                                "value" => 1262,
                                "label" => "Алапаевск"
                            ),
                            array(
                                "value" => 1263,
                                "label" => "Арамиль"
                            ),
                            array(
                                "value" => 1264,
                                "label" => "Артемовский"
                            ),
                            array(
                                "value" => 1265,
                                "label" => "Асбест"
                            ),
                            array(
                                "value" => 1266,
                                "label" => "Березовский (Свердловская область)"
                            ),
                            array(
                                "value" => 1267,
                                "label" => "Богданович"
                            ),
                            array(
                                "value" => 1268,
                                "label" => "Верхний Тагил"
                            ),
                            array(
                                "value" => 1269,
                                "label" => "Верхняя Пышма"
                            ),
                            array(
                                "value" => 1270,
                                "label" => "Верхняя Салда"
                            ),
                            array(
                                "value" => 1271,
                                "label" => "Верхняя Тура"
                            ),
                            array(
                                "value" => 1272,
                                "label" => "Верхотурье"
                            ),
                            array(
                                "value" => 1273,
                                "label" => "Волчанск"
                            ),
                            array(
                                "value" => 1274,
                                "label" => "Дегтярск"
                            ),
                            array(
                                "value" => 3,
                                "label" => "Екатеринбург"
                            ),
                            array(
                                "value" => 1275,
                                "label" => "Заречный (Свердловская область)"
                            ),
                            array(
                                "value" => 1276,
                                "label" => "Ивдель"
                            ),
                            array(
                                "value" => 1277,
                                "label" => "Ирбит"
                            ),
                            array(
                                "value" => 1278,
                                "label" => "Каменск-Уральский"
                            ),
                            array(
                                "value" => 1279,
                                "label" => "Камышлов"
                            ),
                            array(
                                "value" => 1280,
                                "label" => "Карпинск"
                            ),
                            array(
                                "value" => 1281,
                                "label" => "Качканар"
                            ),
                            array(
                                "value" => 1282,
                                "label" => "Кировград"
                            ),
                            array(
                                "value" => 1283,
                                "label" => "Краснотурьинск"
                            ),
                            array(
                                "value" => 1284,
                                "label" => "Красноуральск"
                            ),
                            array(
                                "value" => 1285,
                                "label" => "Красноуфимск"
                            ),
                            array(
                                "value" => 1286,
                                "label" => "Кушва"
                            ),
                            array(
                                "value" => 1287,
                                "label" => "Лесной"
                            ),
                            array(
                                "value" => 1288,
                                "label" => "Михайловск (Свердловская область)"
                            ),
                            array(
                                "value" => 1289,
                                "label" => "Невьянск"
                            ),
                            array(
                                "value" => 1290,
                                "label" => "Нижние Серги"
                            ),
                            array(
                                "value" => 1291,
                                "label" => "Нижний Тагил"
                            ),
                            array(
                                "value" => 1292,
                                "label" => "Нижняя Салда"
                            ),
                            array(
                                "value" => 1293,
                                "label" => "Нижняя Тура"
                            ),
                            array(
                                "value" => 1294,
                                "label" => "Новая Ляля"
                            ),
                            array(
                                "value" => 1295,
                                "label" => "Новоуральск"
                            ),
                            array(
                                "value" => 1296,
                                "label" => "Первоуральск"
                            ),
                            array(
                                "value" => 1297,
                                "label" => "Полевской"
                            ),
                            array(
                                "value" => 1298,
                                "label" => "Ревда"
                            ),
                            array(
                                "value" => 1299,
                                "label" => "Реж"
                            ),
                            array(
                                "value" => 2735,
                                "label" => "Рефтинский"
                            ),
                            array(
                                "value" => 1300,
                                "label" => "Североуральск"
                            ),
                            array(
                                "value" => 1301,
                                "label" => "Серов"
                            ),
                            array(
                                "value" => 1302,
                                "label" => "Среднеуральск"
                            ),
                            array(
                                "value" => 1303,
                                "label" => "Сухой Лог"
                            ),
                            array(
                                "value" => 1304,
                                "label" => "Сысерть"
                            ),
                            array(
                                "value" => 1305,
                                "label" => "Тавда"
                            ),
                            array(
                                "value" => 1306,
                                "label" => "Талица"
                            ),
                            array(
                                "value" => 1307,
                                "label" => "Туринск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1103,
                        "label" => "Смоленская область",
                        "children" =>  array(
                            array(
                                "value" => 1104,
                                "label" => "Велиж"
                            ),
                            array(
                                "value" => 1105,
                                "label" => "Вязьма"
                            ),
                            array(
                                "value" => 1106,
                                "label" => "Гагарин"
                            ),
                            array(
                                "value" => 1107,
                                "label" => "Демидов"
                            ),
                            array(
                                "value" => 1108,
                                "label" => "Десногорск"
                            ),
                            array(
                                "value" => 1109,
                                "label" => "Дорогобуж"
                            ),
                            array(
                                "value" => 1110,
                                "label" => "Духовщина"
                            ),
                            array(
                                "value" => 1111,
                                "label" => "Ельня"
                            ),
                            array(
                                "value" => 1112,
                                "label" => "Починок"
                            ),
                            array(
                                "value" => 1113,
                                "label" => "Рославль"
                            ),
                            array(
                                "value" => 1114,
                                "label" => "Рудня"
                            ),
                            array(
                                "value" => 1115,
                                "label" => "Сафоново"
                            ),
                            array(
                                "value" => 83,
                                "label" => "Смоленск"
                            ),
                            array(
                                "value" => 1116,
                                "label" => "Сычевка"
                            ),
                            array(
                                "value" => 1117,
                                "label" => "Ярцево"
                            )
                        ),
                    ),
                    array(
                        "value" => 1481,
                        "label" => "Ставропольский край",
                        "children" =>  array(
                            array(
                                "value" => 1482,
                                "label" => "Благодарный"
                            ),
                            array(
                                "value" => 1483,
                                "label" => "Буденновск"
                            ),
                            array(
                                "value" => 1484,
                                "label" => "Георгиевск"
                            ),
                            array(
                                "value" => 1485,
                                "label" => "Ессентуки"
                            ),
                            array(
                                "value" => 1486,
                                "label" => "Железноводск"
                            ),
                            array(
                                "value" => 1487,
                                "label" => "Зеленокумск"
                            ),
                            array(
                                "value" => 1488,
                                "label" => "Изобильный"
                            ),
                            array(
                                "value" => 1489,
                                "label" => "Ипатово"
                            ),
                            array(
                                "value" => 1490,
                                "label" => "Кисловодск"
                            ),
                            array(
                                "value" => 2693,
                                "label" => "Курсавка"
                            ),
                            array(
                                "value" => 1491,
                                "label" => "Лермонтов"
                            ),
                            array(
                                "value" => 1492,
                                "label" => "Минеральные Воды"
                            ),
                            array(
                                "value" => 1493,
                                "label" => "Михайловск (Ставропольский край)"
                            ),
                            array(
                                "value" => 1494,
                                "label" => "Невинномысск"
                            ),
                            array(
                                "value" => 1495,
                                "label" => "Нефтекумск"
                            ),
                            array(
                                "value" => 1496,
                                "label" => "Новоалександровск"
                            ),
                            array(
                                "value" => 1497,
                                "label" => "Новопавловск"
                            ),
                            array(
                                "value" => 1498,
                                "label" => "Пятигорск"
                            ),
                            array(
                                "value" => 1499,
                                "label" => "Светлоград"
                            ),
                            array(
                                "value" => 84,
                                "label" => "Ставрополь"
                            )
                        ),
                    ),
                    array(
                        "value" => 1905,
                        "label" => "Тамбовская область",
                        "children" =>  array(
                            array(
                                "value" => 1906,
                                "label" => "Жердевка"
                            ),
                            array(
                                "value" => 1907,
                                "label" => "Кирсанов"
                            ),
                            array(
                                "value" => 1908,
                                "label" => "Котовск"
                            ),
                            array(
                                "value" => 1909,
                                "label" => "Мичуринск"
                            ),
                            array(
                                "value" => 1910,
                                "label" => "Моршанск"
                            ),
                            array(
                                "value" => 1911,
                                "label" => "Рассказово"
                            ),
                            array(
                                "value" => 87,
                                "label" => "Тамбов"
                            ),
                            array(
                                "value" => 1912,
                                "label" => "Уварово"
                            )
                        ),
                    ),
                    array(
                        "value" => 1783,
                        "label" => "Тверская область",
                        "children" =>  array(
                            array(
                                "value" => 1784,
                                "label" => "Андреаполь"
                            ),
                            array(
                                "value" => 1785,
                                "label" => "Бежецк"
                            ),
                            array(
                                "value" => 1786,
                                "label" => "Белый"
                            ),
                            array(
                                "value" => 1787,
                                "label" => "Бологое"
                            ),
                            array(
                                "value" => 1788,
                                "label" => "Весьегонск"
                            ),
                            array(
                                "value" => 1789,
                                "label" => "Вышний Волочек"
                            ),
                            array(
                                "value" => 1790,
                                "label" => "Западная Двина"
                            ),
                            array(
                                "value" => 1791,
                                "label" => "Зубцов"
                            ),
                            array(
                                "value" => 1792,
                                "label" => "Калязин"
                            ),
                            array(
                                "value" => 1793,
                                "label" => "Кашин"
                            ),
                            array(
                                "value" => 1794,
                                "label" => "Кимры"
                            ),
                            array(
                                "value" => 1795,
                                "label" => "Конаково"
                            ),
                            array(
                                "value" => 1796,
                                "label" => "Красный Холм"
                            ),
                            array(
                                "value" => 1797,
                                "label" => "Кувшиново"
                            ),
                            array(
                                "value" => 1798,
                                "label" => "Лихославль"
                            ),
                            array(
                                "value" => 1799,
                                "label" => "Нелидово"
                            ),
                            array(
                                "value" => 1800,
                                "label" => "Осташков"
                            ),
                            array(
                                "value" => 2102,
                                "label" => "Рамешки"
                            ),
                            array(
                                "value" => 1801,
                                "label" => "Ржев"
                            ),
                            array(
                                "value" => 1802,
                                "label" => "Старица"
                            ),
                            array(
                                "value" => 89,
                                "label" => "Тверь"
                            ),
                            array(
                                "value" => 1803,
                                "label" => "Торжок"
                            ),
                            array(
                                "value" => 1804,
                                "label" => "Торопец"
                            ),
                            array(
                                "value" => 1805,
                                "label" => "Удомля"
                            )
                        ),
                    ),
                    array(
                        "value" => 1255,
                        "label" => "Томская область",
                        "children" =>  array(
                            array(
                                "value" => 1256,
                                "label" => "Асино"
                            ),
                            array(
                                "value" => 1257,
                                "label" => "Кедровый"
                            ),
                            array(
                                "value" => 1258,
                                "label" => "Колпашево"
                            ),
                            array(
                                "value" => 1259,
                                "label" => "Северск"
                            ),
                            array(
                                "value" => 1260,
                                "label" => "Стрежевой"
                            ),
                            array(
                                "value" => 90,
                                "label" => "Томск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1913,
                        "label" => "Тульская область",
                        "children" =>  array(
                            array(
                                "value" => 1914,
                                "label" => "Алексин"
                            ),
                            array(
                                "value" => 1915,
                                "label" => "Белев"
                            ),
                            array(
                                "value" => 1916,
                                "label" => "Богородицк"
                            ),
                            array(
                                "value" => 1917,
                                "label" => "Болохово"
                            ),
                            array(
                                "value" => 1918,
                                "label" => "Венев"
                            ),
                            array(
                                "value" => 1919,
                                "label" => "Донской"
                            ),
                            array(
                                "value" => 1920,
                                "label" => "Ефремов"
                            ),
                            array(
                                "value" => 2733,
                                "label" => "Заокский"
                            ),
                            array(
                                "value" => 1921,
                                "label" => "Кимовск"
                            ),
                            array(
                                "value" => 1922,
                                "label" => "Киреевск"
                            ),
                            array(
                                "value" => 1923,
                                "label" => "Липки"
                            ),
                            array(
                                "value" => 1924,
                                "label" => "Новомосковск (Тульская область)"
                            ),
                            array(
                                "value" => 1925,
                                "label" => "Плавск"
                            ),
                            array(
                                "value" => 1926,
                                "label" => "Советск (Тульская область)"
                            ),
                            array(
                                "value" => 1927,
                                "label" => "Суворов"
                            ),
                            array(
                                "value" => 92,
                                "label" => "Тула"
                            ),
                            array(
                                "value" => 1928,
                                "label" => "Узловая"
                            ),
                            array(
                                "value" => 1929,
                                "label" => "Чекалин"
                            ),
                            array(
                                "value" => 1930,
                                "label" => "Щекино"
                            ),
                            array(
                                "value" => 1931,
                                "label" => "Ясногорск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1342,
                        "label" => "Тюменская область",
                        "children" =>  array(
                            array(
                                "value" => 1343,
                                "label" => "Заводоуковск"
                            ),
                            array(
                                "value" => 1344,
                                "label" => "Ишим"
                            ),
                            array(
                                "value" => 1345,
                                "label" => "Тобольск"
                            ),
                            array(
                                "value" => 95,
                                "label" => "Тюмень"
                            ),
                            array(
                                "value" => 1346,
                                "label" => "Ялуторовск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1646,
                        "label" => "Удмуртская Республика",
                        "children" =>  array(
                            array(
                                "value" => 1647,
                                "label" => "Воткинск"
                            ),
                            array(
                                "value" => 1648,
                                "label" => "Глазов"
                            ),
                            array(
                                "value" => 96,
                                "label" => "Ижевск"
                            ),
                            array(
                                "value" => 1649,
                                "label" => "Камбарка"
                            ),
                            array(
                                "value" => 1650,
                                "label" => "Можга"
                            ),
                            array(
                                "value" => 1651,
                                "label" => "Сарапул"
                            )
                        ),
                    ),
                    array(
                        "value" => 1614,
                        "label" => "Ульяновская область",
                        "children" =>  array(
                            array(
                                "value" => 1615,
                                "label" => "Барыш"
                            ),
                            array(
                                "value" => 1616,
                                "label" => "Димитровград"
                            ),
                            array(
                                "value" => 1617,
                                "label" => "Инза"
                            ),
                            array(
                                "value" => 1618,
                                "label" => "Новоульяновск"
                            ),
                            array(
                                "value" => 1619,
                                "label" => "Сенгилей"
                            ),
                            array(
                                "value" => 98,
                                "label" => "Ульяновск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1975,
                        "label" => "Хабаровский край",
                        "children" =>  array(
                            array(
                                "value" => 1976,
                                "label" => "Амурск"
                            ),
                            array(
                                "value" => 1977,
                                "label" => "Бикин"
                            ),
                            array(
                                "value" => 2690,
                                "label" => "Ванино"
                            ),
                            array(
                                "value" => 1978,
                                "label" => "Вяземский"
                            ),
                            array(
                                "value" => 1979,
                                "label" => "Комсомольск-на-Амуре"
                            ),
                            array(
                                "value" => 1980,
                                "label" => "Николаевск-на-Амуре"
                            ),
                            array(
                                "value" => 1981,
                                "label" => "Советская Гавань"
                            ),
                            array(
                                "value" => 102,
                                "label" => "Хабаровск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1368,
                        "label" => "Ханты-Мансийский АО - Югра",
                        "children" =>  array(
                            array(
                                "value" => 1369,
                                "label" => "Белоярский"
                            ),
                            array(
                                "value" => 2686,
                                "label" => "Излучинск"
                            ),
                            array(
                                "value" => 1370,
                                "label" => "Когалым"
                            ),
                            array(
                                "value" => 1371,
                                "label" => "Лангепас"
                            ),
                            array(
                                "value" => 1372,
                                "label" => "Лянтор"
                            ),
                            array(
                                "value" => 1373,
                                "label" => "Мегион"
                            ),
                            array(
                                "value" => 1374,
                                "label" => "Нефтеюганск"
                            ),
                            array(
                                "value" => 1375,
                                "label" => "Нижневартовск"
                            ),
                            array(
                                "value" => 1376,
                                "label" => "Нягань"
                            ),
                            array(
                                "value" => 1377,
                                "label" => "Покачи"
                            ),
                            array(
                                "value" => 1378,
                                "label" => "Пыть-Ях"
                            ),
                            array(
                                "value" => 1379,
                                "label" => "Радужный (Ханты-Мансийский АО - Югра)"
                            ),
                            array(
                                "value" => 1380,
                                "label" => "Советский (Ханты-Мансийский АО)"
                            ),
                            array(
                                "value" => 1381,
                                "label" => "Сургут"
                            ),
                            array(
                                "value" => 1382,
                                "label" => "Урай"
                            ),
                            array(
                                "value" => 2685,
                                "label" => "Федоровский"
                            ),
                            array(
                                "value" => 147,
                                "label" => "Ханты-Мансийск"
                            ),
                            array(
                                "value" => 1383,
                                "label" => "Югорск"
                            )
                        ),
                    ),
                    array(
                        "value" => 1384,
                        "label" => "Челябинская область",
                        "children" =>  array(
                            array(
                                "value" => 1385,
                                "label" => "Аша"
                            ),
                            array(
                                "value" => 1386,
                                "label" => "Бакал"
                            ),
                            array(
                                "value" => 1387,
                                "label" => "Верхнеуральск"
                            ),
                            array(
                                "value" => 1388,
                                "label" => "Верхний Уфалей"
                            ),
                            array(
                                "value" => 1389,
                                "label" => "Еманжелинск"
                            ),
                            array(
                                "value" => 2671,
                                "label" => "Еткуль"
                            ),
                            array(
                                "value" => 1390,
                                "label" => "Златоуст"
                            ),
                            array(
                                "value" => 1391,
                                "label" => "Карабаш"
                            ),
                            array(
                                "value" => 1392,
                                "label" => "Карталы"
                            ),
                            array(
                                "value" => 1393,
                                "label" => "Касли"
                            ),
                            array(
                                "value" => 1394,
                                "label" => "Катав-Ивановск"
                            ),
                            array(
                                "value" => 1395,
                                "label" => "Копейск"
                            ),
                            array(
                                "value" => 1396,
                                "label" => "Коркино"
                            ),
                            array(
                                "value" => 1397,
                                "label" => "Куса"
                            ),
                            array(
                                "value" => 1398,
                                "label" => "Кыштым"
                            ),
                            array(
                                "value" => 1399,
                                "label" => "Магнитогорск"
                            ),
                            array(
                                "value" => 1400,
                                "label" => "Миасс"
                            ),
                            array(
                                "value" => 1401,
                                "label" => "Миньяр"
                            ),
                            array(
                                "value" => 1402,
                                "label" => "Нязепетровск"
                            ),
                            array(
                                "value" => 1403,
                                "label" => "Озерск (Челябинская область)"
                            ),
                            array(
                                "value" => 1404,
                                "label" => "Пласт"
                            ),
                            array(
                                "value" => 1405,
                                "label" => "Сатка"
                            ),
                            array(
                                "value" => 1406,
                                "label" => "Сим"
                            ),
                            array(
                                "value" => 1407,
                                "label" => "Снежинск"
                            ),
                            array(
                                "value" => 1408,
                                "label" => "Трехгорный"
                            ),
                            array(
                                "value" => 1409,
                                "label" => "Троицк (Челябинская область)"
                            ),
                            array(
                                "value" => 1410,
                                "label" => "Усть-Катав"
                            ),
                            array(
                                "value" => 1411,
                                "label" => "Чебаркуль"
                            ),
                            array(
                                "value" => 104,
                                "label" => "Челябинск"
                            ),
                            array(
                                "value" => 1412,
                                "label" => "Южноуральск"
                            ),
                            array(
                                "value" => 1413,
                                "label" => "Юрюзань"
                            )
                        ),
                    ),
                    array(
                        "value" => 1500,
                        "label" => "Чеченская республика",
                        "children" =>  array(
                            array(
                                "value" => 1501,
                                "label" => "Аргун"
                            ),
                            array(
                                "value" => 105,
                                "label" => "Грозный"
                            ),
                            array(
                                "value" => 1502,
                                "label" => "Гудермес"
                            ),
                            array(
                                "value" => 1503,
                                "label" => "Урус-Мартан"
                            ),
                            array(
                                "value" => 1504,
                                "label" => "Шали"
                            )
                        ),
                    ),
                    array(
                        "value" => 1652,
                        "label" => "Чувашская Республика",
                        "children" =>  array(
                            array(
                                "value" => 1653,
                                "label" => "Алатырь"
                            ),
                            array(
                                "value" => 1654,
                                "label" => "Канаш"
                            ),
                            array(
                                "value" => 1655,
                                "label" => "Козловка"
                            ),
                            array(
                                "value" => 1656,
                                "label" => "Мариинский Посад"
                            ),
                            array(
                                "value" => 1657,
                                "label" => "Новочебоксарск"
                            ),
                            array(
                                "value" => 1658,
                                "label" => "Цивильск"
                            ),
                            array(
                                "value" => 107,
                                "label" => "Чебоксары"
                            ),
                            array(
                                "value" => 1659,
                                "label" => "Шумерля"
                            ),
                            array(
                                "value" => 1660,
                                "label" => "Ядрин"
                            )
                        ),
                    ),
                    array(
                        "value" => 1982,
                        "label" => "Чукотский АО",
                        "children" =>  array(
                            array(
                                "value" => 219,
                                "label" => "Анадырь"
                            ),
                            array(
                                "value" => 1983,
                                "label" => "Билибино"
                            ),
                            array(
                                "value" => 1984,
                                "label" => "Певек"
                            )
                        ),
                    ),
                    array(
                        "value" => 1414,
                        "label" => "Ямало-Ненецкий АО",
                        "children" =>  array(
                            array(
                                "value" => 1415,
                                "label" => "Губкинский"
                            ),
                            array(
                                "value" => 1416,
                                "label" => "Лабытнанги"
                            ),
                            array(
                                "value" => 1417,
                                "label" => "Муравленко"
                            ),
                            array(
                                "value" => 1418,
                                "label" => "Надым"
                            ),
                            array(
                                "value" => 1419,
                                "label" => "Новый Уренгой"
                            ),
                            array(
                                "value" => 1420,
                                "label" => "Ноябрьск"
                            ),
                            array(
                                "value" => 304,
                                "label" => "Салехард"
                            ),
                            array(
                                "value" => 1421,
                                "label" => "Тарко-Сале"
                            ),
                            array(
                                "value" => 2688,
                                "label" => "Уренгой"
                            ),
                            array(
                                "value" => 2687,
                                "label" => "Харп"
                            )
                        ),
                    ),
                    array(
                        "value" => 1806,
                        "label" => "Ярославская область",
                        "children" =>  array(
                            array(
                                "value" => 1807,
                                "label" => "Гаврилов-Ям"
                            ),
                            array(
                                "value" => 1808,
                                "label" => "Данилов"
                            ),
                            array(
                                "value" => 1809,
                                "label" => "Любим"
                            ),
                            array(
                                "value" => 1810,
                                "label" => "Мышкин"
                            ),
                            array(
                                "value" => 1811,
                                "label" => "Переславль-Залесский"
                            ),
                            array(
                                "value" => 1812,
                                "label" => "Пошехонье"
                            ),
                            array(
                                "value" => 1813,
                                "label" => "Ростов (Ярославская область)"
                            ),
                            array(
                                "value" => 1814,
                                "label" => "Рыбинск"
                            ),
                            array(
                                "value" => 1815,
                                "label" => "Тутаев"
                            ),
                            array(
                                "value" => 1816,
                                "label" => "Углич"
                            ),
                            array(
                                "value" => 112,
                                "label" => "Ярославль"
                            )
                        ),
                    )
                ),
            ),
            array(
                "value" => 5,
                "label" => "Украина",
                "children" =>  array(
                    array(
                        "value" => 2121,
                        "label" => "Винницкая область",
                        "children" =>  array(
                            array(
                                "value" => 116,
                                "label" => "Винница"
                            )
                        ),
                    ),
                    array(
                        "value" => 2123,
                        "label" => "Волынская область",
                        "children" =>  array(
                            array(
                                "value" => 2124,
                                "label" => "Ковель"
                            ),
                            array(
                                "value" => 124,
                                "label" => "Луцк"
                            )
                        ),
                    ),
                    array(
                        "value" => 2126,
                        "label" => "Днепропетровская область",
                        "children" =>  array(
                            array(
                                "value" => 2717,
                                "label" => "Верхнеднепровск"
                            ),
                            array(
                                "value" => 2716,
                                "label" => "Вольногорск"
                            ),
                            array(
                                "value" => 2127,
                                "label" => "Днепродзержинск"
                            ),
                            array(
                                "value" => 117,
                                "label" => "Днепропетровск"
                            ),
                            array(
                                "value" => 2129,
                                "label" => "Желтые Воды"
                            ),
                            array(
                                "value" => 2101,
                                "label" => "Кривой Рог"
                            ),
                            array(
                                "value" => 2131,
                                "label" => "Никополь"
                            ),
                            array(
                                "value" => 2132,
                                "label" => "Новомосковск (Днепропетровская область)"
                            ),
                            array(
                                "value" => 2133,
                                "label" => "Павлоград"
                            )
                        ),
                    ),
                    array(
                        "value" => 2134,
                        "label" => "Донецкая область",
                        "children" =>  array(
                            array(
                                "value" => 2135,
                                "label" => "Артемовск (Украина)"
                            ),
                            array(
                                "value" => 2136,
                                "label" => "Горловка"
                            ),
                            array(
                                "value" => 118,
                                "label" => "Донецк (Украина)"
                            ),
                            array(
                                "value" => 2508,
                                "label" => "Дружковка"
                            ),
                            array(
                                "value" => 2138,
                                "label" => "Енакиево"
                            ),
                            array(
                                "value" => 2656,
                                "label" => "Константиновка"
                            ),
                            array(
                                "value" => 2139,
                                "label" => "Краматорск"
                            ),
                            array(
                                "value" => 2140,
                                "label" => "Макеевка"
                            ),
                            array(
                                "value" => 2104,
                                "label" => "Мариуполь"
                            ),
                            array(
                                "value" => 2142,
                                "label" => "Славянск"
                            ),
                            array(
                                "value" => 2143,
                                "label" => "Снежное"
                            ),
                            array(
                                "value" => 2144,
                                "label" => "Торез"
                            ),
                            array(
                                "value" => 2145,
                                "label" => "Харцызск"
                            ),
                            array(
                                "value" => 2146,
                                "label" => "Шахтерск (Украина)"
                            ),
                            array(
                                "value" => 2509,
                                "label" => "Ясиноватая"
                            )
                        ),
                    ),
                    array(
                        "value" => 2147,
                        "label" => "Житомирская область",
                        "children" =>  array(
                            array(
                                "value" => 2148,
                                "label" => "Бердичев"
                            ),
                            array(
                                "value" => 119,
                                "label" => "Житомир"
                            ),
                            array(
                                "value" => 2150,
                                "label" => "Коростень"
                            ),
                            array(
                                "value" => 2151,
                                "label" => "Новоград-Волынский"
                            ),
                            array(
                                "value" => 2713,
                                "label" => "Радомышль"
                            )
                        ),
                    ),
                    array(
                        "value" => 2152,
                        "label" => "Закарпатская область",
                        "children" =>  array(
                            array(
                                "value" => 2153,
                                "label" => "Мукачево"
                            ),
                            array(
                                "value" => 134,
                                "label" => "Ужгород"
                            )
                        ),
                    ),
                    array(
                        "value" => 2155,
                        "label" => "Запорожская область",
                        "children" =>  array(
                            array(
                                "value" => 2156,
                                "label" => "Бердянск"
                            ),
                            array(
                                "value" => 2720,
                                "label" => "Гуляйполе"
                            ),
                            array(
                                "value" => 120,
                                "label" => "Запорожье"
                            ),
                            array(
                                "value" => 2718,
                                "label" => "Куйбышево"
                            ),
                            array(
                                "value" => 2158,
                                "label" => "Мелитополь"
                            ),
                            array(
                                "value" => 2719,
                                "label" => "Новониколаевка"
                            ),
                            array(
                                "value" => 2721,
                                "label" => "Розовка"
                            ),
                            array(
                                "value" => 2159,
                                "label" => "Энергодар"
                            )
                        ),
                    ),
                    array(
                        "value" => 2160,
                        "label" => "Ивано-Франковская область",
                        "children" =>  array(
                            array(
                                "value" => 121,
                                "label" => "Ивано-Франковск"
                            ),
                            array(
                                "value" => 2162,
                                "label" => "Калуш"
                            ),
                            array(
                                "value" => 2163,
                                "label" => "Коломыя"
                            )
                        ),
                    ),
                    array(
                        "value" => 115,
                        "label" => "Киев"
                    ),
                    array(
                        "value" => 2164,
                        "label" => "Киевская область",
                        "children" =>  array(
                            array(
                                "value" => 2165,
                                "label" => "Белая Церковь"
                            ),
                            array(
                                "value" => 2166,
                                "label" => "Борисполь"
                            ),
                            array(
                                "value" => 2445,
                                "label" => "Боярка"
                            ),
                            array(
                                "value" => 2167,
                                "label" => "Бровары"
                            ),
                            array(
                                "value" => 2434,
                                "label" => "Гостомель"
                            ),
                            array(
                                "value" => 2676,
                                "label" => "Кагарлык"
                            ),
                            array(
                                "value" => 2673,
                                "label" => "Обухов"
                            ),
                            array(
                                "value" => 2675,
                                "label" => "Ржищев"
                            ),
                            array(
                                "value" => 2674,
                                "label" => "Украинка"
                            ),
                            array(
                                "value" => 2168,
                                "label" => "Фастов"
                            )
                        ),
                    ),
                    array(
                        "value" => 2169,
                        "label" => "Кировоградская область",
                        "children" =>  array(
                            array(
                                "value" => 2170,
                                "label" => "Александрия"
                            ),
                            array(
                                "value" => 2715,
                                "label" => "Знаменка"
                            ),
                            array(
                                "value" => 122,
                                "label" => "Кировоград"
                            ),
                            array(
                                "value" => 2172,
                                "label" => "Светловодск"
                            )
                        ),
                    ),
                    array(
                        "value" => 2173,
                        "label" => "Луганская область",
                        "children" =>  array(
                            array(
                                "value" => 2174,
                                "label" => "Алчевск"
                            ),
                            array(
                                "value" => 2175,
                                "label" => "Красный Луч"
                            ),
                            array(
                                "value" => 2176,
                                "label" => "Лисичанск"
                            ),
                            array(
                                "value" => 123,
                                "label" => "Луганск"
                            ),
                            array(
                                "value" => 2513,
                                "label" => "Рубежное"
                            ),
                            array(
                                "value" => 2178,
                                "label" => "Северодонецк"
                            ),
                            array(
                                "value" => 2179,
                                "label" => "Стаханов"
                            )
                        ),
                    ),
                    array(
                        "value" => 2180,
                        "label" => "Львовская область",
                        "children" =>  array(
                            array(
                                "value" => 2181,
                                "label" => "Дрогобыч"
                            ),
                            array(
                                "value" => 2714,
                                "label" => "Каменка-Бугская"
                            ),
                            array(
                                "value" => 125,
                                "label" => "Львов"
                            ),
                            array(
                                "value" => 2183,
                                "label" => "Стрый"
                            ),
                            array(
                                "value" => 2184,
                                "label" => "Червоноград"
                            )
                        ),
                    ),
                    array(
                        "value" => 2185,
                        "label" => "Николаевская область",
                        "children" =>  array(
                            array(
                                "value" => 2724,
                                "label" => "Еланец"
                            ),
                            array(
                                "value" => 126,
                                "label" => "Николаев"
                            ),
                            array(
                                "value" => 2187,
                                "label" => "Первомайск (Украина)"
                            )
                        ),
                    ),
                    array(
                        "value" => 2188,
                        "label" => "Одесская область",
                        "children" =>  array(
                            array(
                                "value" => 2189,
                                "label" => "Белгород-Днестровский"
                            ),
                            array(
                                "value" => 2190,
                                "label" => "Измаил"
                            ),
                            array(
                                "value" => 2191,
                                "label" => "Ильичевск"
                            ),
                            array(
                                "value" => 127,
                                "label" => "Одесса"
                            )
                        ),
                    ),
                    array(
                        "value" => 2193,
                        "label" => "Полтавская область",
                        "children" =>  array(
                            array(
                                "value" => 2194,
                                "label" => "Комсомольск (Украина)"
                            ),
                            array(
                                "value" => 2107,
                                "label" => "Кременчуг"
                            ),
                            array(
                                "value" => 2196,
                                "label" => "Лубны"
                            ),
                            array(
                                "value" => 2485,
                                "label" => "Миргород"
                            ),
                            array(
                                "value" => 128,
                                "label" => "Полтава"
                            )
                        ),
                    ),
                    array(
                        "value" => 2198,
                        "label" => "Ровенская область",
                        "children" =>  array(
                            array(
                                "value" => 129,
                                "label" => "Ровно"
                            )
                        ),
                    ),
                    array(
                        "value" => 2200,
                        "label" => "Сумская область",
                        "children" =>  array(
                            array(
                                "value" => 2443,
                                "label" => "Ахтырка"
                            ),
                            array(
                                "value" => 2201,
                                "label" => "Конотоп"
                            ),
                            array(
                                "value" => 132,
                                "label" => "Сумы"
                            ),
                            array(
                                "value" => 2203,
                                "label" => "Шостка"
                            )
                        ),
                    ),
                    array(
                        "value" => 2204,
                        "label" => "Тернопольская область",
                        "children" =>  array(
                            array(
                                "value" => 2722,
                                "label" => "Бережаны"
                            ),
                            array(
                                "value" => 2723,
                                "label" => "Борщев"
                            ),
                            array(
                                "value" => 133,
                                "label" => "Тернополь"
                            )
                        ),
                    ),
                    array(
                        "value" => 2206,
                        "label" => "Харьковская область",
                        "children" =>  array(
                            array(
                                "value" => 2207,
                                "label" => "Изюм"
                            ),
                            array(
                                "value" => 135,
                                "label" => "Харьков"
                            )
                        ),
                    ),
                    array(
                        "value" => 2209,
                        "label" => "Херсонская область",
                        "children" =>  array(
                            array(
                                "value" => 2210,
                                "label" => "Новая Каховка"
                            ),
                            array(
                                "value" => 136,
                                "label" => "Херсон"
                            )
                        ),
                    ),
                    array(
                        "value" => 2212,
                        "label" => "Хмельницкая область",
                        "children" =>  array(
                            array(
                                "value" => 2213,
                                "label" => "Каменец-Подольский"
                            ),
                            array(
                                "value" => 2712,
                                "label" => "Славута"
                            ),
                            array(
                                "value" => 137,
                                "label" => "Хмельницкий"
                            ),
                            array(
                                "value" => 2215,
                                "label" => "Шепетовка"
                            )
                        ),
                    ),
                    array(
                        "value" => 2216,
                        "label" => "Черкасская область",
                        "children" =>  array(
                            array(
                                "value" => 2711,
                                "label" => "Жашков"
                            ),
                            array(
                                "value" => 2217,
                                "label" => "Смела"
                            ),
                            array(
                                "value" => 2218,
                                "label" => "Умань"
                            ),
                            array(
                                "value" => 138,
                                "label" => "Черкассы"
                            )
                        ),
                    ),
                    array(
                        "value" => 2220,
                        "label" => "Черниговская область",
                        "children" =>  array(
                            array(
                                "value" => 2221,
                                "label" => "Нежин"
                            ),
                            array(
                                "value" => 2222,
                                "label" => "Прилуки"
                            ),
                            array(
                                "value" => 140,
                                "label" => "Чернигов"
                            )
                        ),
                    ),
                    array(
                        "value" => 2224,
                        "label" => "Черновицкая область",
                        "children" =>  array(
                            array(
                                "value" => 139,
                                "label" => "Черновцы"
                            )
                        ),
                    )
                ),
            ),
            array(
                "value" => 40,
                "label" => "Казахстан",
                "children" =>  array(
                    array(
                        "value" => 2728,
                        "label" => "Акколь"
                    ),
                    array(
                        "value" => 150,
                        "label" => "Аксай (Казахстан)"
                    ),
                    array(
                        "value" => 151,
                        "label" => "Аксу (Павлодар.обл)"
                    ),
                    array(
                        "value" => 152,
                        "label" => "Актау"
                    ),
                    array(
                        "value" => 154,
                        "label" => "Актобе"
                    ),
                    array(
                        "value" => 156,
                        "label" => "Алга (Актюбинская обл)"
                    ),
                    array(
                        "value" => 160,
                        "label" => "Алматы"
                    ),
                    array(
                        "value" => 158,
                        "label" => "Аральск"
                    ),
                    array(
                        "value" => 161,
                        "label" => "Аркалык"
                    ),
                    array(
                        "value" => 155,
                        "label" => "Арысь (ЮКО)"
                    ),
                    array(
                        "value" => 159,
                        "label" => "Астана"
                    ),
                    array(
                        "value" => 153,
                        "label" => "Атырау"
                    ),
                    array(
                        "value" => 157,
                        "label" => "Аягоз (ВКО)"
                    ),
                    array(
                        "value" => 2226,
                        "label" => "Байконур (Кызылорд. обл)"
                    ),
                    array(
                        "value" => 164,
                        "label" => "Балхаш"
                    ),
                    array(
                        "value" => 162,
                        "label" => "Баутино"
                    ),
                    array(
                        "value" => 163,
                        "label" => "Бейнеу (Мангистауская обл)"
                    ),
                    array(
                        "value" => 165,
                        "label" => "Ерментау (Акмол.обл)"
                    ),
                    array(
                        "value" => 2510,
                        "label" => "Жанаозен"
                    ),
                    array(
                        "value" => 167,
                        "label" => "Жанатас"
                    ),
                    array(
                        "value" => 166,
                        "label" => "Жезказган"
                    ),
                    array(
                        "value" => 168,
                        "label" => "Зайсан"
                    ),
                    array(
                        "value" => 169,
                        "label" => "Зыряновск"
                    ),
                    array(
                        "value" => 170,
                        "label" => "Иссык"
                    ),
                    array(
                        "value" => 175,
                        "label" => "Казалы (Кызылорд. обл)"
                    ),
                    array(
                        "value" => 171,
                        "label" => "Капчагай"
                    ),
                    array(
                        "value" => 177,
                        "label" => "Караганда"
                    ),
                    array(
                        "value" => 178,
                        "label" => "Каратау"
                    ),
                    array(
                        "value" => 2653,
                        "label" => "Каскелен"
                    ),
                    array(
                        "value" => 173,
                        "label" => "Кентау (ЮКО)"
                    ),
                    array(
                        "value" => 176,
                        "label" => "Кокшетау"
                    ),
                    array(
                        "value" => 172,
                        "label" => "Костанай"
                    ),
                    array(
                        "value" => 174,
                        "label" => "Кызылорда"
                    ),
                    array(
                        "value" => 179,
                        "label" => "Ленгер (ЮКО)"
                    ),
                    array(
                        "value" => 181,
                        "label" => "Павлодар"
                    ),
                    array(
                        "value" => 180,
                        "label" => "Петропавловск"
                    ),
                    array(
                        "value" => 183,
                        "label" => "Риддер (ВКО)"
                    ),
                    array(
                        "value" => 182,
                        "label" => "Рудный"
                    ),
                    array(
                        "value" => 184,
                        "label" => "Сатпаев"
                    ),
                    array(
                        "value" => 185,
                        "label" => "Семей"
                    ),
                    array(
                        "value" => 2755,
                        "label" => "Серебрянск"
                    ),
                    array(
                        "value" => 186,
                        "label" => "Солнечный (ПГТ, Павлодарская обл)"
                    ),
                    array(
                        "value" => 2437,
                        "label" => "Степногорск"
                    ),
                    array(
                        "value" => 188,
                        "label" => "Талдыкорган"
                    ),
                    array(
                        "value" => 187,
                        "label" => "Тараз"
                    ),
                    array(
                        "value" => 189,
                        "label" => "Текели"
                    ),
                    array(
                        "value" => 190,
                        "label" => "Темиртау"
                    ),
                    array(
                        "value" => 191,
                        "label" => "Торгай"
                    ),
                    array(
                        "value" => 192,
                        "label" => "Туркестан"
                    ),
                    array(
                        "value" => 193,
                        "label" => "Уральск"
                    ),
                    array(
                        "value" => 194,
                        "label" => "Усть-Каменогорск"
                    ),
                    array(
                        "value" => 195,
                        "label" => "Хромтау"
                    ),
                    array(
                        "value" => 196,
                        "label" => "Шемонаиха (ВКО)"
                    ),
                    array(
                        "value" => 2729,
                        "label" => "Шу"
                    ),
                    array(
                        "value" => 205,
                        "label" => "Шымкент"
                    ),
                    array(
                        "value" => 197,
                        "label" => "Щучинск"
                    ),
                    array(
                        "value" => 198,
                        "label" => "Экибастуз"
                    )
                ),
            ),
            array(
                "value" => 16,
                "label" => "Беларусь",
                "children" =>  array(
                    array(
                        "value" => 1007,
                        "label" => "Брест"
                    ),
                    array(
                        "value" => 2233,
                        "label" => "Брестская область",
                        "children" =>  array(
                            array(
                                "value" => 2239,
                                "label" => "Барановичи"
                            ),
                            array(
                                "value" => 2630,
                                "label" => "Белоозерск"
                            ),
                            array(
                                "value" => 2240,
                                "label" => "Береза"
                            ),
                            array(
                                "value" => 2590,
                                "label" => "Высокое"
                            ),
                            array(
                                "value" => 2241,
                                "label" => "Ганцевичи"
                            ),
                            array(
                                "value" => 2741,
                                "label" => "Давид-Городок"
                            ),
                            array(
                                "value" => 2242,
                                "label" => "Дрогичин"
                            ),
                            array(
                                "value" => 2243,
                                "label" => "Жабинка"
                            ),
                            array(
                                "value" => 2743,
                                "label" => "Иваново"
                            ),
                            array(
                                "value" => 2244,
                                "label" => "Иваново (Беларусь)"
                            ),
                            array(
                                "value" => 2245,
                                "label" => "Ивацевичи"
                            ),
                            array(
                                "value" => 2246,
                                "label" => "Каменец"
                            ),
                            array(
                                "value" => 2247,
                                "label" => "Кобрин"
                            ),
                            array(
                                "value" => 2745,
                                "label" => "Коссово"
                            ),
                            array(
                                "value" => 2248,
                                "label" => "Лунинец"
                            ),
                            array(
                                "value" => 2249,
                                "label" => "Ляховичи"
                            ),
                            array(
                                "value" => 2250,
                                "label" => "Малорита"
                            ),
                            array(
                                "value" => 2650,
                                "label" => "Микашевичи"
                            ),
                            array(
                                "value" => 2251,
                                "label" => "Пинск"
                            ),
                            array(
                                "value" => 2252,
                                "label" => "Пружаны"
                            ),
                            array(
                                "value" => 2253,
                                "label" => "Столин"
                            )
                        ),
                    ),
                    array(
                        "value" => 1005,
                        "label" => "Витебск"
                    ),
                    array(
                        "value" => 2234,
                        "label" => "Витебская область",
                        "children" =>  array(
                            array(
                                "value" => 2632,
                                "label" => "Барань"
                            ),
                            array(
                                "value" => 2254,
                                "label" => "Бешенковичи"
                            ),
                            array(
                                "value" => 2255,
                                "label" => "Браслав"
                            ),
                            array(
                                "value" => 2256,
                                "label" => "Верхнедвинск"
                            ),
                            array(
                                "value" => 2257,
                                "label" => "Глубокое"
                            ),
                            array(
                                "value" => 2258,
                                "label" => "Городок"
                            ),
                            array(
                                "value" => 2742,
                                "label" => "Дисна"
                            ),
                            array(
                                "value" => 2259,
                                "label" => "Докшицы"
                            ),
                            array(
                                "value" => 2260,
                                "label" => "Дубровно"
                            ),
                            array(
                                "value" => 2261,
                                "label" => "Лепель"
                            ),
                            array(
                                "value" => 2262,
                                "label" => "Лиозно"
                            ),
                            array(
                                "value" => 2263,
                                "label" => "Миоры"
                            ),
                            array(
                                "value" => 2484,
                                "label" => "Новолукомль"
                            ),
                            array(
                                "value" => 2366,
                                "label" => "Новополоцк"
                            ),
                            array(
                                "value" => 2264,
                                "label" => "Орша"
                            ),
                            array(
                                "value" => 2265,
                                "label" => "Полоцк"
                            ),
                            array(
                                "value" => 2266,
                                "label" => "Поставы"
                            ),
                            array(
                                "value" => 2267,
                                "label" => "Россоны"
                            ),
                            array(
                                "value" => 2268,
                                "label" => "Сенно"
                            ),
                            array(
                                "value" => 2269,
                                "label" => "Толочин"
                            ),
                            array(
                                "value" => 2270,
                                "label" => "Ушачи"
                            ),
                            array(
                                "value" => 2271,
                                "label" => "Чашники"
                            ),
                            array(
                                "value" => 2272,
                                "label" => "Шарковщина"
                            ),
                            array(
                                "value" => 2273,
                                "label" => "Шумилино"
                            )
                        ),
                    ),
                    array(
                        "value" => 1003,
                        "label" => "Гомель"
                    ),
                    array(
                        "value" => 2235,
                        "label" => "Гомельская область",
                        "children" =>  array(
                            array(
                                "value" => 2274,
                                "label" => "Брагин"
                            ),
                            array(
                                "value" => 2275,
                                "label" => "Буда-Кошелево"
                            ),
                            array(
                                "value" => 2276,
                                "label" => "Ветка"
                            ),
                            array(
                                "value" => 2277,
                                "label" => "Добруш"
                            ),
                            array(
                                "value" => 2278,
                                "label" => "Ельск"
                            ),
                            array(
                                "value" => 2279,
                                "label" => "Житковичи"
                            ),
                            array(
                                "value" => 2280,
                                "label" => "Жлобин"
                            ),
                            array(
                                "value" => 2281,
                                "label" => "Калинковичи"
                            ),
                            array(
                                "value" => 2282,
                                "label" => "Корма"
                            ),
                            array(
                                "value" => 2283,
                                "label" => "Лельчицы"
                            ),
                            array(
                                "value" => 2284,
                                "label" => "Лоев"
                            ),
                            array(
                                "value" => 2285,
                                "label" => "Мозырь"
                            ),
                            array(
                                "value" => 2286,
                                "label" => "Наровля"
                            ),
                            array(
                                "value" => 2287,
                                "label" => "Октябрьский (Беларусь)"
                            ),
                            array(
                                "value" => 2747,
                                "label" => "Октябрьский (Гомельская область)"
                            ),
                            array(
                                "value" => 2288,
                                "label" => "Петриков"
                            ),
                            array(
                                "value" => 2289,
                                "label" => "Речица"
                            ),
                            array(
                                "value" => 2290,
                                "label" => "Рогачев"
                            ),
                            array(
                                "value" => 2291,
                                "label" => "Светлогорск (Беларусь)"
                            ),
                            array(
                                "value" => 2523,
                                "label" => "Туров"
                            ),
                            array(
                                "value" => 2292,
                                "label" => "Хойники"
                            ),
                            array(
                                "value" => 2293,
                                "label" => "Чечерск"
                            )
                        ),
                    ),
                    array(
                        "value" => 2236,
                        "label" => "Гродненская область",
                        "children" =>  array(
                            array(
                                "value" => 2588,
                                "label" => "Березовка"
                            ),
                            array(
                                "value" => 2294,
                                "label" => "Берестовица"
                            ),
                            array(
                                "value" => 2740,
                                "label" => "Большая Берестовица"
                            ),
                            array(
                                "value" => 2295,
                                "label" => "Волковыск"
                            ),
                            array(
                                "value" => 2296,
                                "label" => "Вороново"
                            ),
                            array(
                                "value" => 2297,
                                "label" => "Дятлово"
                            ),
                            array(
                                "value" => 2298,
                                "label" => "Зельва"
                            ),
                            array(
                                "value" => 2299,
                                "label" => "Ивье"
                            ),
                            array(
                                "value" => 2300,
                                "label" => "Кореличи"
                            ),
                            array(
                                "value" => 2301,
                                "label" => "Лида"
                            ),
                            array(
                                "value" => 2631,
                                "label" => "Мир"
                            ),
                            array(
                                "value" => 2302,
                                "label" => "Мосты"
                            ),
                            array(
                                "value" => 2303,
                                "label" => "Новогрудок"
                            ),
                            array(
                                "value" => 2304,
                                "label" => "Островец"
                            ),
                            array(
                                "value" => 2305,
                                "label" => "Ошмяны"
                            ),
                            array(
                                "value" => 2306,
                                "label" => "Свислочь"
                            ),
                            array(
                                "value" => 2589,
                                "label" => "Скидель"
                            ),
                            array(
                                "value" => 2307,
                                "label" => "Слоним"
                            ),
                            array(
                                "value" => 2308,
                                "label" => "Сморгонь"
                            ),
                            array(
                                "value" => 2309,
                                "label" => "Щучин"
                            )
                        ),
                    ),
                    array(
                        "value" => 1006,
                        "label" => "Гродно"
                    ),
                    array(
                        "value" => 1002,
                        "label" => "Минск"
                    ),
                    array(
                        "value" => 2237,
                        "label" => "Минская область",
                        "children" =>  array(
                            array(
                                "value" => 2310,
                                "label" => "Березино"
                            ),
                            array(
                                "value" => 2311,
                                "label" => "Борисов"
                            ),
                            array(
                                "value" => 2312,
                                "label" => "Вилейка"
                            ),
                            array(
                                "value" => 2313,
                                "label" => "Воложин"
                            ),
                            array(
                                "value" => 2314,
                                "label" => "Дзержинск (Беларусь)"
                            ),
                            array(
                                "value" => 2315,
                                "label" => "Жодино"
                            ),
                            array(
                                "value" => 2316,
                                "label" => "Заславль"
                            ),
                            array(
                                "value" => 2317,
                                "label" => "Клецк"
                            ),
                            array(
                                "value" => 2318,
                                "label" => "Копыль"
                            ),
                            array(
                                "value" => 2319,
                                "label" => "Крупки"
                            ),
                            array(
                                "value" => 2320,
                                "label" => "Логойск"
                            ),
                            array(
                                "value" => 2746,
                                "label" => "Любань"
                            ),
                            array(
                                "value" => 2321,
                                "label" => "Любань (Беларусь)"
                            ),
                            array(
                                "value" => 2322,
                                "label" => "Марьина Горка"
                            ),
                            array(
                                "value" => 2323,
                                "label" => "Молодечно"
                            ),
                            array(
                                "value" => 2324,
                                "label" => "Мядель"
                            ),
                            array(
                                "value" => 2325,
                                "label" => "Несвиж"
                            ),
                            array(
                                "value" => 2326,
                                "label" => "Слуцк"
                            ),
                            array(
                                "value" => 2327,
                                "label" => "Смолевичи"
                            ),
                            array(
                                "value" => 2328,
                                "label" => "Солигорск"
                            ),
                            array(
                                "value" => 2749,
                                "label" => "Старые Дороги"
                            ),
                            array(
                                "value" => 2329,
                                "label" => "Старые дороги"
                            ),
                            array(
                                "value" => 2330,
                                "label" => "Столбцы"
                            ),
                            array(
                                "value" => 2331,
                                "label" => "Узда"
                            ),
                            array(
                                "value" => 2394,
                                "label" => "Фаниполь"
                            ),
                            array(
                                "value" => 2332,
                                "label" => "Червень"
                            )
                        ),
                    ),
                    array(
                        "value" => 1004,
                        "label" => "Могилев"
                    ),
                    array(
                        "value" => 2238,
                        "label" => "Могилевская область",
                        "children" =>  array(
                            array(
                                "value" => 2333,
                                "label" => "Белыничи"
                            ),
                            array(
                                "value" => 2334,
                                "label" => "Бобруйск"
                            ),
                            array(
                                "value" => 2335,
                                "label" => "Быхов"
                            ),
                            array(
                                "value" => 2336,
                                "label" => "Глуск"
                            ),
                            array(
                                "value" => 2337,
                                "label" => "Горки"
                            ),
                            array(
                                "value" => 2338,
                                "label" => "Дрибин"
                            ),
                            array(
                                "value" => 2744,
                                "label" => "Кировск"
                            ),
                            array(
                                "value" => 2339,
                                "label" => "Кировск (Беларусь)"
                            ),
                            array(
                                "value" => 2340,
                                "label" => "Климовичи"
                            ),
                            array(
                                "value" => 2341,
                                "label" => "Кличев"
                            ),
                            array(
                                "value" => 2342,
                                "label" => "Костюковичи"
                            ),
                            array(
                                "value" => 2343,
                                "label" => "Краснополье"
                            ),
                            array(
                                "value" => 2344,
                                "label" => "Кричев"
                            ),
                            array(
                                "value" => 2345,
                                "label" => "Круглое"
                            ),
                            array(
                                "value" => 2346,
                                "label" => "Мстиславль"
                            ),
                            array(
                                "value" => 2347,
                                "label" => "Осиповичи"
                            ),
                            array(
                                "value" => 2748,
                                "label" => "Славгород"
                            ),
                            array(
                                "value" => 2348,
                                "label" => "Славгород (Беларусь)"
                            ),
                            array(
                                "value" => 2349,
                                "label" => "Хотимск"
                            ),
                            array(
                                "value" => 2350,
                                "label" => "Чаусы"
                            ),
                            array(
                                "value" => 2351,
                                "label" => "Чериков"
                            ),
                            array(
                                "value" => 2352,
                                "label" => "Шклов"
                            )
                        ),
                    )
                ),
            ),
            array(
                "value" => 9,
                "label" => "Азербайджан",
                "children" =>  array(
                    array(
                        "value" => 2626,
                        "label" => "Агсу"
                    ),
                    array(
                        "value" => 2492,
                        "label" => "Баку"
                    ),
                    array(
                        "value" => 2625,
                        "label" => "Барда"
                    ),
                    array(
                        "value" => 2493,
                        "label" => "Габала"
                    ),
                    array(
                        "value" => 2624,
                        "label" => "Газах"
                    ),
                    array(
                        "value" => 2623,
                        "label" => "Геранбой"
                    ),
                    array(
                        "value" => 2494,
                        "label" => "Гянджа"
                    ),
                    array(
                        "value" => 2627,
                        "label" => "Гёйчай"
                    ),
                    array(
                        "value" => 2496,
                        "label" => "Закаталы"
                    ),
                    array(
                        "value" => 2621,
                        "label" => "Исмаиллы"
                    ),
                    array(
                        "value" => 2497,
                        "label" => "Куба (Азербайджан)"
                    ),
                    array(
                        "value" => 2644,
                        "label" => "Кусары"
                    ),
                    array(
                        "value" => 2498,
                        "label" => "Ленкорань"
                    ),
                    array(
                        "value" => 2499,
                        "label" => "Мингечаур"
                    ),
                    array(
                        "value" => 2500,
                        "label" => "Нахичевань"
                    ),
                    array(
                        "value" => 2501,
                        "label" => "Ордубад"
                    ),
                    array(
                        "value" => 2495,
                        "label" => "Сумгаит"
                    ),
                    array(
                        "value" => 2622,
                        "label" => "Тертер"
                    ),
                    array(
                        "value" => 2502,
                        "label" => "Шеки"
                    ),
                    array(
                        "value" => 2503,
                        "label" => "Шемаха"
                    )
                ),
            ),
            array(
                "value" => 1001,
                "label" => "Другие страны",
                "children" =>  array(
                    array(
                        "value" => 2112,
                        "label" => "Абхазия"
                    ),
                    array(
                        "value" => 6,
                        "label" => "Австралия"
                    ),
                    array(
                        "value" => 7,
                        "label" => "Австрия"
                    ),
                    array(
                        "value" => 2357,
                        "label" => "Албания"
                    ),
                    array(
                        "value" => 2368,
                        "label" => "Алжир"
                    ),
                    array(
                        "value" => 2376,
                        "label" => "Ангола"
                    ),
                    array(
                        "value" => 2354,
                        "label" => "Андорра"
                    ),
                    array(
                        "value" => 235,
                        "label" => "Аргентина"
                    ),
                    array(
                        "value" => 13,
                        "label" => "Армения"
                    ),
                    array(
                        "value" => 2110,
                        "label" => "Афганистан"
                    ),
                    array(
                        "value" => 303,
                        "label" => "Бангладеш"
                    ),
                    array(
                        "value" => 2361,
                        "label" => "Бахрейн"
                    ),
                    array(
                        "value" => 18,
                        "label" => "Бельгия"
                    ),
                    array(
                        "value" => 200,
                        "label" => "Болгария"
                    ),
                    array(
                        "value" => 2228,
                        "label" => "Боливия"
                    ),
                    array(
                        "value" => 2358,
                        "label" => "Босния и Герцеговина"
                    ),
                    array(
                        "value" => 243,
                        "label" => "Бразилия"
                    ),
                    array(
                        "value" => 306,
                        "label" => "Буркина Фасо"
                    ),
                    array(
                        "value" => 21,
                        "label" => "Великобритания"
                    ),
                    array(
                        "value" => 114,
                        "label" => "Венгрия"
                    ),
                    array(
                        "value" => 2371,
                        "label" => "Венесуэла"
                    ),
                    array(
                        "value" => 203,
                        "label" => "Вьетнам"
                    ),
                    array(
                        "value" => 2586,
                        "label" => "Габон"
                    ),
                    array(
                        "value" => 202,
                        "label" => "Гвинея"
                    ),
                    array(
                        "value" => 27,
                        "label" => "Германия"
                    ),
                    array(
                        "value" => 2435,
                        "label" => "Государство Палестина"
                    ),
                    array(
                        "value" => 213,
                        "label" => "Греция"
                    ),
                    array(
                        "value" => 28,
                        "label" => "Грузия",
                        "children" =>  array(
                            array(
                                "value" => 2758,
                                "label" => "Тбилиси"
                            )
                        ),
                    ),
                    array(
                        "value" => 30,
                        "label" => "Дания"
                    ),
                    array(
                        "value" => 311,
                        "label" => "Демократическая Республика Конго"
                    ),
                    array(
                        "value" => 2730,
                        "label" => "Доминиканская Республика"
                    ),
                    array(
                        "value" => 305,
                        "label" => "Египет"
                    ),
                    array(
                        "value" => 33,
                        "label" => "Израиль"
                    ),
                    array(
                        "value" => 209,
                        "label" => "Индия"
                    ),
                    array(
                        "value" => 2108,
                        "label" => "Индонезия"
                    ),
                    array(
                        "value" => 2365,
                        "label" => "Иордания"
                    ),
                    array(
                        "value" => 2232,
                        "label" => "Ирак"
                    ),
                    array(
                        "value" => 2227,
                        "label" => "Иран"
                    ),
                    array(
                        "value" => 36,
                        "label" => "Ирландия"
                    ),
                    array(
                        "value" => 302,
                        "label" => "Исландия"
                    ),
                    array(
                        "value" => 37,
                        "label" => "Испания"
                    ),
                    array(
                        "value" => 38,
                        "label" => "Италия"
                    ),
                    array(
                        "value" => 2109,
                        "label" => "Йемен"
                    ),
                    array(
                        "value" => 245,
                        "label" => "Камбоджа"
                    ),
                    array(
                        "value" => 45,
                        "label" => "Канада"
                    ),
                    array(
                        "value" => 210,
                        "label" => "Катар"
                    ),
                    array(
                        "value" => 236,
                        "label" => "Кипр"
                    ),
                    array(
                        "value" => 50,
                        "label" => "Китай"
                    ),
                    array(
                        "value" => 2113,
                        "label" => "Колумбия"
                    ),
                    array(
                        "value" => 2380,
                        "label" => "Кооперативная Республика Гайана"
                    ),
                    array(
                        "value" => 2362,
                        "label" => "Королевство Саудовская Аравия"
                    ),
                    array(
                        "value" => 2363,
                        "label" => "Кувейт"
                    ),
                    array(
                        "value" => 48,
                        "label" => "Кыргызстан",
                        "children" =>  array(
                            array(
                                "value" => 2760,
                                "label" => "Бишкек"
                            )
                        ),
                    ),
                    array(
                        "value" => 57,
                        "label" => "Латвия"
                    ),
                    array(
                        "value" => 2111,
                        "label" => "Ливан"
                    ),
                    array(
                        "value" => 2106,
                        "label" => "Ливия"
                    ),
                    array(
                        "value" => 59,
                        "label" => "Литва"
                    ),
                    array(
                        "value" => 2355,
                        "label" => "Лихтенштейн"
                    ),
                    array(
                        "value" => 206,
                        "label" => "Люксембург"
                    ),
                    array(
                        "value" => 2359,
                        "label" => "Македония"
                    ),
                    array(
                        "value" => 238,
                        "label" => "Малайзия"
                    ),
                    array(
                        "value" => 2353,
                        "label" => "Мальта"
                    ),
                    array(
                        "value" => 2372,
                        "label" => "Марокко"
                    ),
                    array(
                        "value" => 2229,
                        "label" => "Мексика"
                    ),
                    array(
                        "value" => 62,
                        "label" => "Молдавия"
                    ),
                    array(
                        "value" => 2356,
                        "label" => "Монако"
                    ),
                    array(
                        "value" => 2231,
                        "label" => "Монголия"
                    ),
                    array(
                        "value" => 2487,
                        "label" => "Мьянма"
                    ),
                    array(
                        "value" => 2375,
                        "label" => "Намибия"
                    ),
                    array(
                        "value" => 240,
                        "label" => "Нигерия"
                    ),
                    array(
                        "value" => 65,
                        "label" => "Нидерланды"
                    ),
                    array(
                        "value" => 204,
                        "label" => "Новая Зеландия"
                    ),
                    array(
                        "value" => 207,
                        "label" => "Норвегия"
                    ),
                    array(
                        "value" => 208,
                        "label" => "ОАЭ"
                    ),
                    array(
                        "value" => 2364,
                        "label" => "Оман"
                    ),
                    array(
                        "value" => 316,
                        "label" => "Пакистан",
                        "children" =>  array(
                            array(
                                "value" => 2637,
                                "label" => "Карачи"
                            )
                        ),
                    ),
                    array(
                        "value" => 2587,
                        "label" => "Панама"
                    ),
                    array(
                        "value" => 2395,
                        "label" => "Перу"
                    ),
                    array(
                        "value" => 74,
                        "label" => "Польша"
                    ),
                    array(
                        "value" => 241,
                        "label" => "Португалия"
                    ),
                    array(
                        "value" => 2752,
                        "label" => "Республика Бенин"
                    ),
                    array(
                        "value" => 2491,
                        "label" => "Республика Гана"
                    ),
                    array(
                        "value" => 2504,
                        "label" => "Республика Зимбабве"
                    ),
                    array(
                        "value" => 2669,
                        "label" => "Республика Камерун"
                    ),
                    array(
                        "value" => 2453,
                        "label" => "Республика Кения"
                    ),
                    array(
                        "value" => 312,
                        "label" => "Республика Конго"
                    ),
                    array(
                        "value" => 2636,
                        "label" => "Республика Коста-Рика"
                    ),
                    array(
                        "value" => 2454,
                        "label" => "Республика Кот-д’Ивуар"
                    ),
                    array(
                        "value" => 2635,
                        "label" => "Республика Куба"
                    ),
                    array(
                        "value" => 2398,
                        "label" => "Республика Либерия"
                    ),
                    array(
                        "value" => 2370,
                        "label" => "Республика Маврикий"
                    ),
                    array(
                        "value" => 2488,
                        "label" => "Республика Мадагаскар"
                    ),
                    array(
                        "value" => 2378,
                        "label" => "Республика Нигер"
                    ),
                    array(
                        "value" => 2446,
                        "label" => "Республика Северный Судан"
                    ),
                    array(
                        "value" => 2367,
                        "label" => "Республика Сейшельские острова"
                    ),
                    array(
                        "value" => 2374,
                        "label" => "Республика Сенегал"
                    ),
                    array(
                        "value" => 2369,
                        "label" => "Реюньон"
                    ),
                    array(
                        "value" => 234,
                        "label" => "Румыния"
                    ),
                    array(
                        "value" => 85,
                        "label" => "США"
                    ),
                    array(
                        "value" => 146,
                        "label" => "Сербия и Черногория"
                    ),
                    array(
                        "value" => 233,
                        "label" => "Сингапур"
                    ),
                    array(
                        "value" => 317,
                        "label" => "Сирия"
                    ),
                    array(
                        "value" => 318,
                        "label" => "Словакия"
                    ),
                    array(
                        "value" => 2105,
                        "label" => "Словения"
                    ),
                    array(
                        "value" => 86,
                        "label" => "Таджикистан"
                    ),
                    array(
                        "value" => 300,
                        "label" => "Таиланд"
                    ),
                    array(
                        "value" => 148,
                        "label" => "Тайвань"
                    ),
                    array(
                        "value" => 244,
                        "label" => "Тунис"
                    ),
                    array(
                        "value" => 93,
                        "label" => "Туркменистан"
                    ),
                    array(
                        "value" => 94,
                        "label" => "Турция"
                    ),
                    array(
                        "value" => 97,
                        "label" => "Узбекистан",
                        "children" =>  array(
                            array(
                                "value" => 2759,
                                "label" => "Ташкент"
                            )
                        ),
                    ),
                    array(
                        "value" => 2360,
                        "label" => "Филиппины"
                    ),
                    array(
                        "value" => 100,
                        "label" => "Финляндия"
                    ),
                    array(
                        "value" => 101,
                        "label" => "Франция"
                    ),
                    array(
                        "value" => 2103,
                        "label" => "Хорватия"
                    ),
                    array(
                        "value" => 199,
                        "label" => "Чехия"
                    ),
                    array(
                        "value" => 2396,
                        "label" => "Чили"
                    ),
                    array(
                        "value" => 108,
                        "label" => "Швейцария"
                    ),
                    array(
                        "value" => 149,
                        "label" => "Швеция"
                    ),
                    array(
                        "value" => 239,
                        "label" => "Шотландия"
                    ),
                    array(
                        "value" => 2511,
                        "label" => "Шри-Ланка"
                    ),
                    array(
                        "value" => 242,
                        "label" => "Эквадор"
                    ),
                    array(
                        "value" => 109,
                        "label" => "Эстония"
                    ),
                    array(
                        "value" => 2520,
                        "label" => "Эфиопия"
                    ),
                    array(
                        "value" => 211,
                        "label" => "ЮАР"
                    ),
                    array(
                        "value" => 110,
                        "label" => "Южная Корея"
                    ),
                    array(
                        "value" => 2524,
                        "label" => "Южная Осетия",
                        "children" =>  array(
                            array(
                                "value" => 2525,
                                "label" => "Цхинвал"
                            )
                        ),
                    ),
                    array(
                        "value" => 2440,
                        "label" => "Ямайка"
                    ),
                    array(
                        "value" => 111,
                        "label" => "Япония"
                    )
                ),
            )
        );
    }

}