<?php

use yii\db\Migration;

/**
 * Class m200825_103540_create_table_news
 */
class m200825_103540_create_table_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(120)->notNull(),
            'text' => $this->text()
        ]);

        Yii::$app->db->createCommand()->batchInsert('{{%news}}', ['title','text'], [
            ['В Steam стартовала распродажа серий Need for Speed и The Witcher','В Steam стартовала распродажа сразу двух франшиз: Need for Speed и The Witcher. Игры популярных серий можно приобрести со скидками до 75%.<br>Акция завершится 30 августа.<br>Распродажа The Witcher:Акция завершится 7 сентября.<br>Десять других лучших скидок в Steam на этой неделе можно увидеть здесь.'],
            ['Пятый тур чемпионата России по футболу откроется двумя матчами','ТАСС, 25 августа. Программа пятого тура Тинькофф — Российской премьер-лиги (РПЛ) откроется во вторник двумя матчами. Между собой сыграют «Тамбов» и «Сочи», «Арсенал» (Тула) и «Химки».<br>В первом матче тура сойдутся дебютировавшие в РПЛ в прошлом сезоне «Тамбов» и «Сочи». После четырех встреч сезона-2020/21 команды расположились на разных полюсах турнирной таблицы — тамбовчане с тремя очками занимают 14-е место, а сочинцы, в активе которых восемь очков, находятся на третьей позиции. Номинальные хозяева поля на старте турнира потерпели поражения от «Ростова» (0:1), столичного ЦСКА (1:2) и петербургского «Зенита» (1:4), а также обыграли вернувшиеся в РПЛ после 11-летнего перерыва «Химки» (1:0). Гости же после ничьих с московским «Спартаком» (2:2) и «Химками (1:1) обыграли казанский «Рубин» (3:2) и волгоградский «Ротор» (2:1).'],
            ['Куман избавился от Суареса за минуту по телефону. Он уйдет свободным агентом, «Барса» сэкономит до 24 млн','Роналд Куман возглавил «Барселону» и сразу же обозначил цель: «Нужно усердно работать, чтобы вернуть престиж команде».<br><br>Видимо, усердно работать будут новые молодые игроки — тренер решил избавиться от стариков. Начал с Луиса Суареса.<br><br>В понедельник утром Куман позвонил форварду и сообщил, что не рассчитывает на него. Разговор продлился меньше минуты, обошлись без деталей: Суарес сказал, что не будет скандалить. Теперь главное — комфортное расторжение: у Луиса контракт до 2021 года, но клуб разорвет его и заплатит часть зарплаты за следующий сезон.<br><br>COPE сообщает, что уругваец недоволен: считает, что это неправильный способ обращаться с тем, кто на протяжении последних шести лет отдавал все силы клубу. Несколько дней назад Суарес выдал очень мощный монолог, который объясняет позицию.'],
            ['Москва спустя 85 лет прекратила троллейбусное движение','Москва. 25 августа. INTERFAX.RU — Со вторника в Москве прекратилось движение троллейбусов по последним шести регулярным маршрутам, позже будет запущен только один маршрут с ретротроллейбусами, сообщает ГУП «Мосгортранс».<br><br>Так, последние троллейбусные маршруты №№ м4, 28, 59, 60, 64, 72 с 25 августа переведены на автобусы и электробусы. По маршруту № м4 запущены электробусы, по остальным маршрутам, названным №№ т28, т59, т60, т64, т72 запущены автобусы.<br><br>Гендиректор ГУП «Мосгортранс» Леонид Антонов, слова которого приводит пресс-служба, заявил, что в знак уважения к троллейбусу руководство города приняло решение оставить один троллейбусный маршрут в Москве навсегда — от Комсомольской площади до Новорязанской улицы.'],
            ['Оппозиция Белоруссии заявила о готовности к переговорам с властями','Бывший кандидат в президенты Белоруссии Светлана Тихановская заявила, что белорусская оппозиция готова выдвинуть своих представителей для переговоров с властями. Об этом она сказала на внеочередном заседании Комитете по иностранным делам Европарламента, передает ТАСС.<br><br>«Я заявляю о готовности вступить в переговоры с властями. Мы готовы назвать наших переговорщиков», — сказала политик.<br><br>9 августа в Белоруссии прошли выборы президента. После закрытия избирательных участков в республике начались массовые акции протеста против фальсификаций результатов. В ходе протестов силовики применяли против демонстрантов слезоточивый газ, светошумовые гранаты и резиновые пули.<br><br>Позже в стране начались забастовки на крупнейших промышленных предприятиях, сотрудники требуют проведения новых выборов и прекращения жесткого обращения с протестующими на демонстрациях. Все штабы оппозиционных кандидатов заявили о непризнании официальных результатов.'],
            ['Forbes назвал богатейшие семьи России','Журнал Forbes опубликовал ежегодный рейтинг самых богатых семей России. В нем впервые за шесть лет в нем сменился лидер.<br><br>Первое место в списке заняла семья братьев Аркадия и Бориса Ротенбергов. Их состояние, по оценке издания, за год увеличилось на $270 млн, до $5,45 млрд. До этого семья Ротенбергов возглавляла рейтинг самых богатых российских семей только один раз — в 2014 г.<br><br>На втором месте в списке впервые дебютировала семья Гурьевых, которым принадлежит компания-производитель удобрений «Фосагро». Их совокупное состояние Forbes оценил в $5,45 млрд.'],
            ['Будут ли праздновать День города в Чебоксарах?','Любимый праздник жителей Чебоксар - День города обычно празднуется в третье воскресенье августа. В этом году в связи с эпидемиологической ситуацией его, конечно, нельзя будет провести в обычном режиме - с массовыми гуляньями, концертами и прочим. Чувашия пока находится на втором этапе снятия ограничений, который не позволяет проводить мероприятия с большим количеством людей.<br><br>Однако администрация города решила не отказываться от праздника - День города впервые будет проведен в новом формате. Большая часть события перенесется в онлайн-пространство.']
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
