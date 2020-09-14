<?php
namespace Game;

use Game\Classes\AddAttack;
use Game\Classes\BattleNow;
use Game\Classes\Character;
use Game\Classes\CharacterFactory;
use Game\Classes\Lucky;
use Game\Classes\MagicShield;
use Game\Classes\RapidStrike;


include("./vendor/autoload.php");

//$hero = new Character(70, 100, 70, 80, 45, 55, 40, 50, 10, 30);
//$enemy = new Character(60, 90, 60, 90, 40, 60, 40, 60, 25, 40);

$hero = CharacterFactory::create("Orderus")
    ->addHealth(70, 100)
    ->addStrength(70, 80)
    ->addDefence(45, 55)
    ->addSpeed(40, 50)
    ->addLucky(10, 30)
    ->addSkill(new RapidStrike(10, "attack"))
    ->addSkill(new AddAttack(100, "attack", 20))
    ->addSkill(new MagicShield(20, "defence"));
$hero->addSkill(new Lucky($hero->getLucky(), "defence"));
$enemy = CharacterFactory::create("Wild Beast")
    ->addHealth(60, 90)
    ->addStrength(60, 90)
    ->addDefence(40, 60)
    ->addSpeed(40, 60)
    ->addLucky(25, 40);
$enemy->addSkill(new Lucky($enemy->getLucky(), "defence"));
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
$battle->battle();
?>
</body>
</html>

<?php




?>
