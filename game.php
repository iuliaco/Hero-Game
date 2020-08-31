<?php
namespace Game;

use Game\Classes\BattleNow;
use Game\Classes\Character;

include("./vendor/autoload.php");

$hero = new Character(70, 100, 70, 80, 45, 55, 40, 50, 10, 30);
$enemy = new Character(60, 90, 60, 90, 40, 60, 40, 60, 25, 40);


$battle = new BattleNow($hero, $enemy);

?>
<!Doctype html>
<html>
<head>
    <title>Hero game</title>
</head>
<body>
<h1>Hero-game</h1>
<?php
echo $hero->get_health();
$battle->battle();
$battle->showSkills();
?>
</body>
</html>
