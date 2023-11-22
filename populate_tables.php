<?php
    require 'db_connect.php';

    $connect->query("INSERT into movies (title, genre, summary, studio) Values 
    ('Gintama: The Final',
    'Action', 
    'Two years have passed following the Tendoshuus invasion of the O-Edo Central Terminal. Since then, the Yorozuya have gone their separate ways.', 
    'Bandai Namco Pictures'
    )");

    $connect->query("INSERT into movies (title, genre, summary, studio) Values 
    ('A Silent Voice',
    'Drama', 
    'As a wild youth, elementary school student Shouya Ishida sought to beat boredom in the cruelest ways.', 
    'Kyoto Animation'
    )");

    $connect->query("INSERT into movies (title, genre, summary, studio) Values 
    ('Gintama: The Movie: The Final Chapter: Be Forever Yorozuya',
    'Action', 
    'When Gintoki apprehends a movie pirate at a premiere, he checks the cameras footage and finds himself transported to a bleak, post-apocalyptic version of Edo, where a mysterious epidemic called the White Plague has ravished the worlds population.', 
    'Sunrise'
    )");

    $connect->query("INSERT into movies (title, genre, summary, studio) Values 
    ('Violet Evergarden: The Movie',
    'Fantasy', 
    'Several years have passed since the end of The Great War.', 
    'Kyoto Animation'
    )");

    $connect->query("INSERT into movies (title, genre, summary, studio) Values 
    ('Your Name.',
    'Drama', 
    'Mitsuha Miyamizu, a high school girl, yearns to live the life of a boy in the bustling city of Tokyo—a dream that stands in stark contrast to her present life in the countryside.', 
    'CoMix Wave Films'
    )");

    $connect->query("INSERT into movies (title, genre, summary, studio) Values 
    ('Kaguya-sama: Love is War - The First Kiss That Never Ends',
    'Comedy', 
    'After their first kiss, Kaguya Shinomiya and Miyuki Shirogane are left unsure where their relationship stands.', 
    'A-1 Pictures'
    )");

    $connect->query("INSERT into movies (title, genre, summary, studio) Values 
    ('The First Slam Dunk',
    'Sports', 
    'Shohokus speedster and point guard, Ryouta Miyagi, always plays with brains and lightning speed, running circles around his opponents while feigning composure.', 
    'Toei Animation'
    )");

    $connect->query("INSERT into movies (title, genre, summary, studio) Values 
    ('Kizumonogatari Part 3: Cold-Blooded',
    'Supernatural', 
    'After helping revive the legendary vampire Kiss-shot Acerola-orion Heart-under-blade, Koyomi Araragi has become a vampire himself and her servant.', 
    'Shaft'
    )");

    $connect->query("INSERT into movies (title, genre, summary, studio) Values 
    ('Spirited Away',
    'Supernatural', 
    'Stubborn, spoiled, and naïve, 10-year-old Chihiro Ogino is less than pleased when she and her parents discover an abandoned amusement park on the way to their new house.', 
    'Studio Ghibli'
    )");

    $connect->query("INSERT into movies (title, genre, summary, studio) Values 
    ('Princess Mononoke',
    'Fantasy', 
    'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 
    'Studio Ghibli'
    )");

    $connect->close();

    //movie: movie_id, title, genre, user_id, summary, studio
?>