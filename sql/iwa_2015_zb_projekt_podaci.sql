-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2013 at 02:28 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
USE `iwa_2015_zb_projekt` ;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`tip_id`, `naziv`) VALUES
(0, 'administrator'),
(1, 'voditelj'),
(2, 'korisnik');


--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `tip_id`, `korisnicko_ime`, `lozinka`, `ime`, `prezime`, `email`, `slika`) VALUES
(1, 0, 'admin', 'foi', 'Administrator', '', '', 'korisnici/admin.jpg'),
(2, 1, 'voditelj', '123456', 'voditelj', '', '', 'korisnici/admin.jpg'),
(3, 2, 'pkos', '123456', 'Pero', 'Kos', 'pkos@fff.hr', 'korisnici/pkos.jpg'),
(4, 2, 'vzec', '123456', 'Vladimir', 'Zec', 'vzec@fff.hr', 'korisnici/vzec.jpg'),
(5, 2, 'qtarantino', '123456', 'Quentin', 'Tarantino', 'qtarantino@foi.hr', 'korisnici/qtarantino.jpg'),
(6, 2, 'mbellucci', '123456', 'Monica', 'Bellucci', 'mbellucci@foi.hr', 'korisnici/mbellucci.jpg'),
(7, 2, 'vmortensen', '123456', 'Viggo', 'Mortensen', 'vmortensen@foi.hr', 'korisnici/vmortensen.jpg'),
(8, 2, 'jgarner', '123456', 'Jennifer', 'Garner', 'jgarner@foi.hr', 'korisnici/jgarner.jpg'),
(9, 2, 'nportman', '123456', 'Natalie', 'Portman', 'nportman@foi.hr', 'korisnici/nportman.jpg'),
(10, 2, 'dradcliffe', '123456', 'Daniel', 'Radcliffe', 'dradcliffe@foi.hr', 'korisnici/dradcliffe.jpg'),
(11, 2, 'hberry', '123456', 'Halle', 'Berry', 'hberry@foi.hr', 'korisnici/hberry.jpg'),
(12, 2, 'vdiesel', '123456', 'Vin', 'Diesel', 'vdiesel@foi.hr', 'korisnici/vdiesel.jpg'),
(13, 2, 'ecuthbert', '123456', 'Elisha', 'Cuthbert', 'ecuthbert@foi.hr', 'korisnici/ecuthbert.jpg'),
(14, 2, 'janiston', '123456', 'Jennifer', 'Aniston', 'janiston@foi.hr', 'korisnici/janiston.jpg'),
(15, 2, 'ctheron', '123456', 'Charlize', 'Theron', 'ctheron@foi.hr', 'korisnici/ctheron.jpg'),
(16, 2, 'nkidman', '123456', 'Nicole', 'Kidman', 'nkidman@foi.hr', 'korisnici/nkidman.jpg'),
(17, 2, 'ewatson', '123456', 'Emma', 'Watson', 'ewatson@foi.hr', 'korisnici/ewatson.jpg'),
(18, 1, 'kdunst', '123456', 'Kirsten', 'Dunst', 'kdunst@foi.hr', 'korisnici/kdunst.jpg'),
(19, 2, 'sjohansson', '123456', 'Scarlett', 'Johansson', 'sjohansson@foi.hr', 'korisnici/sjohansson.jpg'),
(20, 2, 'philton', '123456', 'Paris', 'Hilton', 'philton@foi.hr', 'korisnici/philton.jpg'),
(21, 2, 'kbeckinsale', '123456', 'Kate', 'Beckinsale', 'kbeckinsale@foi.hr', 'korisnici/kbeckinsale.jpg'),
(22, 2, 'tcruise', '123456', 'Tom', 'Cruise', 'tcruise@foi.hr', 'korisnici/tcruise.jpg'),
(23, 2, 'hduff', '123456', 'Hilary', 'Duff', 'hduff@foi.hr', 'korisnici/hduff.jpg'),
(24, 2, 'ajolie', '123456', 'Angelina', 'Jolie', 'ajolie@foi.hr', 'korisnici/ajolie.jpg'),
(25, 2, 'kknightley', '123456', 'Keira', 'Knightley', 'kknightley@foi.hr', 'korisnici/kknightley.jpg'),
(26, 2, 'obloom', '123456', 'Orlando', 'Bloom', 'obloom@foi.hr', 'korisnici/obloom.jpg'),
(27, 2, 'llohan', '123456', 'Lindsay', 'Lohan', 'llohan@foi.hr', 'korisnici/llohan.jpg'),
(28, 2, 'jdepp', '123456', 'Johnny', 'Depp', 'jdepp@foi.hr', 'korisnici/jdepp.jpg'),
(29, 2, 'kreeves', '123456', 'Keanu', 'Reeves', 'kreeves@foi.hr', 'korisnici/kreeves.jpg'),
(30, 1, 'thanks', '123456', 'Tom', 'Hanks', 'thanks@foi.hr', 'korisnici/thanks.jpg'),
(31, 2, 'elongoria', '123456', 'Eva', 'Longoria', 'elongoria@foi.hr', 'korisnici/elongoria.jpg'),
(32, 2, 'rde', '123456', 'Robert', 'De', 'rde@foi.hr', 'korisnici/rde.jpg'),
(33, 2, 'jheder', '123456', 'Jon', 'Heder', 'jheder@foi.hr', 'korisnici/jheder.jpg'),
(34, 2, 'rmcadams', '123456', 'Rachel', 'McAdams', 'rmcadams@foi.hr', 'korisnici/rmcadams.jpg'),
(35, 2, 'cbale', '123456', 'Christian', 'Bale', 'cbale@foi.hr', 'korisnici/cbale.jpg'),
(36, 1, 'jalba', '123456', 'Jessica', 'Alba', 'jalba@foi.hr', 'korisnici/jalba.jpg'),
(37, 2, 'bpitt', '123456', 'Brad', 'Pitt', 'bpitt@foi.hr', 'korisnici/bpitt.jpg'),
(43, 2, 'apacino', '123456', 'Al', 'Pacino', 'apacino@foi.hr', 'korisnici/apacino.jpg'),
(44, 2, 'wsmith', '123456', 'Will', 'Smith', 'wsmith@foi.hr', 'korisnici/wsmith.jpg'),
(45, 2, 'ncage', '123456', 'Nicolas', 'Cage', 'ncage@foi.hr', 'korisnici/ncage.jpg'),
(46, 2, 'vanne', '123456', 'Vanessa', 'Anne', 'vanne@foi.hr', 'korisnici/vanne.jpg'),
(47, 2, 'kheigl', '123456', 'Katherine', 'Heigl', 'kheigl@foi.hr', 'korisnici/kheigl.jpg'),
(48, 2, 'gbutler', '123456', 'Gerard', 'Butler', 'gbutler@foi.hr', 'korisnici/gbutler.jpg'),
(49, 2, 'jbiel', '123456', 'Jessica', 'Biel', 'jbiel@foi.hr', 'korisnici/jbiel.jpg'),
(50, 2, 'ldicaprio', '123456', 'Leonardo', 'DiCaprio', 'ldicaprio@foi.hr', 'korisnici/ldicaprio.jpg'),
(51, 2, 'mdamon', '123456', 'Matt', 'Damon', 'mdamon@foi.hr', 'korisnici/mdamon.jpg'),
(52, 2, 'hpanettiere', '123456', 'Hayden', 'Panettiere', 'hpanettiere@foi.hr', 'korisnici/hpanettiere.jpg'),
(53, 2, 'rreynolds', '123456', 'Ryan', 'Reynolds', 'rreynolds@foi.hr', 'korisnici/rreynolds.jpg'),
(54, 2, 'jstatham', '123456', 'Jason', 'Statham', 'jstatham@foi.hr', 'korisnici/jstatham.jpg'),
(55, 2, 'enorton', '123456', 'Edward', 'Norton', 'enorton@foi.hr', 'korisnici/enorton.jpg'),
(56, 2, 'mwahlberg', '123456', 'Mark', 'Wahlberg', 'mwahlberg@foi.hr', 'korisnici/mwahlberg.jpg'),
(57, 2, 'jmcavoy', '123456', 'James', 'McAvoy', 'jmcavoy@foi.hr', 'korisnici/jmcavoy.jpg'),
(58, 2, 'epage', '123456', 'Ellen', 'Page', 'epage@foi.hr', 'korisnici/epage.jpg'),
(59, 2, 'mcyrus', '123456', 'Miley', 'Cyrus', 'mcyrus@foi.hr', 'korisnici/mcyrus.jpg'),
(60, 2, 'kstewart', '123456', 'Kristen', 'Stewart', 'kstewart@foi.hr', 'korisnici/kstewart.jpg'),
(61, 2, 'mfox', '123456', 'Megan', 'Fox', 'mfox@foi.hr', 'korisnici/mfox.jpg'),
(62, 2, 'slabeouf', '123456', 'Shia', 'LaBeouf', 'slabeouf@foi.hr', 'korisnici/slabeouf.jpg'),
(63, 2, 'ceastwood', '123456', 'Clint', 'Eastwood', 'ceastwood@foi.hr', 'korisnici/ceastwood.jpg'),
(64, 2, 'srogen', '123456', 'Seth', 'Rogen', 'srogen@foi.hr', 'korisnici/srogen.jpg'),
(65, 2, 'nreed', '123456', 'Nikki', 'Reed', 'nreed@foi.hr', 'korisnici/nreed.jpg'),
(66, 2, 'agreene', '123456', 'Ashley', 'Greene', 'agreene@foi.hr', 'korisnici/agreene.jpg'),
(67, 2, 'zdeschanel', '123456', 'Zooey', 'Deschanel', 'zdeschanel@foi.hr', 'korisnici/zdeschanel.jpg'),
(68, 2, 'dfanning', '123456', 'Dakota', 'Fanning', 'dfanning@foi.hr', 'korisnici/dfanning.jpg'),
(69, 2, 'tlautner', '123456', 'Taylor', 'Lautner', 'tlautner@foi.hr', 'korisnici/tlautner.jpg'),
(70, 2, 'rpattinson', '123456', 'Robert', 'Pattinson', 'rpattinson@foi.hr', 'korisnici/rpattinson.jpg');


INSERT INTO `uzrast` (`uzrast_id`, `naziv`, `moderator_id`,`opis`) VALUES
(1, 'novorođenče', 2,'0-3 mjeseca'),
(2, 'bebe 4-6', 2,'4-6 mjeseci'),
(3, 'bebe 7-9', 2,'7-9 mjeseci'),
(4, 'bebe 10-12', 2,'10-12 mjeseci'),
(5, 'djeca 1-3', 18,'1 - 3 godine'),
(6, 'djeca 4-6', 18,'4-6 godine'),
(7, 'osnovna škola 1-4', 18,'1. - 4. razreda osnovne škole'),
(8, 'osnovna škola 5-8', 18,'5. - 8. razreda osnovne škole'),
(9, 'srednja škola', 2,'');


INSERT INTO `igra` (`igra_id`, `uzrast_id`, `naziv`, `opis`,`datum`,`vrijeme`,`slika`,`video`) VALUES
(1, 1,  'Dance, Dance Revolution', 'In the afternoons when my baby got grumpy, nothing worked as well as dancing with her. I`d put on some music — she preferred soulful tunes from Stevie Wonder and James Brown — and either put her in the sling or hold her in my arms.At first she preferred soft swaying. Later on she liked me to swing her in the air or bump her up and down rather rudely. (Just be sure to offer neck support and do not shake your baby.) When your arms get tired, put your baby down and keep up the dance. Silly exaggerated movements like jazz hands or shaking your butt are particularly funny to babies. Close the drapes so the neighbors won`t see.','2015-11-09','11:43','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg','http://www.w3schools.com/html/mov_bbb.mp4'),
(2, 1,  "Let's Look at Stuff","Most of your early playtime will be spent showing your baby stuff. Any object in the house that won't poison, electrocute, or otherwise hurt him is fair game. Babies love egg beaters, spoons, wire whisks, spatulas, books and magazines with pictures, bottles of shampoo or conditioner (don't leave your baby alone with these!), record albums, colorful fabrics or clothes, fruits and vegetables, and so on.Keep a little stash of objects beside you and sit with your baby. When the moment's right, whip something out like a magician. Look, Kyle, Daddy's bicycle bell. Hold the object still about a foot from his face and stare at it yourself. Hey, now that you look at it, that bicycle bell is kind of interesting. Congratulations! You're thinking like a baby!Oh, and don't expect babies to really get books at this age. You'll know they're enjoying them by their way of getting still and watchful when you bring a favorite book out.Babies don't tend to sit through a whole story, though, and when they're a few months older they'll grab the books from you and close them. This is all developmental stuff. Babies love looking at books and cuddling close to you, but they usually don't care about the plot.",'2015-11-09','10:43','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg',''),
(3, 1,  "Journey Into Mom's Closet","You haven't spent a lifetime accumulating a closetful of bright, slinky, tactile clothing for nothing. Dig into your closet and show your baby your cashmere sweater, your cottony-soft favorite jeans, your brilliant plaid skirt. Run soft or silky fabrics over his face, hands, and feet. Lay fuzzy stuff down on the floor and put your baby on top of it.In a few months, your baby will want to run his hands over anything beaded, embroidered, or otherwise embellished. But for now, he may just be content to gaze in wonder.",'2015-11-09','12:43','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg',''),
(4, 1,  "Hey! What's Over My Head?","You'll be amazed at how much fun you can have with the simplest stuff around your house. Here are three ideas to start you off:Tie or tape some ribbons, fabric, or other interesting streamers onto a wooden spoon and dangle them gently over and in front of your baby's face.Take a floaty scarf and fling it into the air, letting it settle on your baby's head.Tie a toy to an elastic string (like the kind used for cat toys) and bounce it up and down in front of your baby's face, saying Boing! Boing! every time it descends.Remember, never leave your baby alone with strings or ribbons that could encircle his neck or that he could get into his mouth.",'2015-11-09','11:45','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg',''),
(5, 1,  "The Diva Within","You may have a terrible voice — but your kid doesn't know it! Now's the time to sing at volume 10, so set free that opera voice inside you.Your baby may like absolutely anything you sing, but there are some classics you should know. Itsy Bitsy Spider was the only song that made my baby stop crying when she was on a jag. And most kids like any song with movements — The Wheels on the Bus,Row, Row, Row Your Boat,Head, Shoulders, Knees, and Toes, and Patty-Cake, to name a few. (If you don't remember the words to a favorite song, try an Internet search. )You may feel silly at first, but as your child gets into it, so will you. Try adding your baby's name to the song: Old Mac Ethan had a farm,Kate is my sunshine, my only sunshine, and so on. Try songs with silly sounds or animal noises in them, like Witch Doctor or How Much Is That Doggie in the Window?try singing a song in a low growly voice and then in a high squeaky voice, to see which gets the most reaction. Try singing the song breathily into your baby's ear, or use a hand puppet (or a napkin or sock willing to play the part of a hand puppet). And get used to singing, because this could begin to eat up a significant portion of your day.",'2015-11-08','11:43','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg',''),
(6, 2,  "Smell the Spice Rack","You're in the kitchen, trying to throw some kind of dinner together when your baby starts wailing. Take her over to the spice rack and introduce her to the intoxicating scent of cinnamon. Rub some on your hand and put it up to your baby's nose. (Don't let it get in her eyes or mouth.)If she likes it, try others: Vanilla, peppermint, cumin, cloves, nutmeg, and many other herbs and spices have intriguing fragrances that your baby might love. Other household goods are fragrant, too: Dad's shaving lotion, Mom's hand cream. Sniff out everything yummy — just be careful not to let your baby eat it!",'2015-11-07','11:43','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg',''),
(7, 2,  "Bubbles, Bubbles Everywhere","There's something magical about bubbles, and at this point your baby can see far enough away to focus on them. Blow bubbles when she's getting fussy waiting for the bus and watch the tears dry up. Blow bubbles in the park to attract older kids who'll caper nearby and entertain your baby in the process. Blow bubbles in the bathtub or out on the porch when it's late afternoon and your baby is cranky. Bubbles are unbelievably cheap, easily transportable, and endlessly fascinating for babies.",'2015-11-06','11:43','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg',''),
(8, 2,  "I'm Gonna Get You!","Your baby is old enough to have a sense of anticipation now. And no baby can resist your coming at her mock-menacingly with a threat of hugs, kisses, or tickles. Here's what you could say: Hey, Andrea! I see you over there sitting up! Well, that just makes you closer to my lips and I'm going to come over there and kiss you! I'm going to steal a kiss, baby! I'm coming! I'm coming! I...gotcha! Then cover your baby in smooches.In our house we threaten to eat the baby and punctuate our advances with lip chomps on her fat little feet. A delicacy! When your baby's older you can modify this game to include a chase around the house — this works wonderfully as a way to get your child out the door when you're in a rush.",'2015-11-09','11:53','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg',''),
(9, 2,  "This Little Piggy","Touch your baby's toes in turn, starting with the big toe. Say, This little piggy went to market, this little piggy stayed home, this little piggy had roast beef, this little piggy had none. And this little piggy went wee-wee-wee all the way home.As you say that last part, run your fingers up your baby's belly. This game is useful for putting on socks and shoes or distracting your baby during diaper changes. You can also play this game in the bathtub with a squirt bottle targeting your baby's toes.",'2015-11-01','11:43','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg',''),
(10, 2, "Tummy Time","By now, your doctor's probably nagging you to get your baby on her tummy, and your baby may be protesting vociferously. Get down on the floor with your baby. Look her in the eye as you lie on your own belly. Lay your baby down on a towel and use it to gently roll her from side to side. Try saying, Oops-a-daisy, Oops-a-daisy as you roll her.",'2015-11-02','11:43','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg',''),
(11, 2, "Fly, Baby, Fly!","Now that your baby can hold her head up, it's time to hoist her into the air. You can play that she's a rocket ship, flying her over you and making realistic rocket noises (dads are great at this). You can play that your baby is in an elevator, which advances up floor by floor before sinking quickly to the bottom (my husband likes to bump noses with our baby and say Ding! at this point). Or pretend that your baby's doing a helicopter traffic report.",'2015-11-09','11:42','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg',''),
(12, 3, "Touch It, Hold It, Bang It","If your baby has one object, he'll bang it on the table. If he has two objects, he'll bang them together, hold them up to the light, squint at them, bang them separately on the table, hit the table with both at the same time, see if the object sounds different when hit using the left hand rather than the right hand, and on and on.Help him out by handing over objects that make interesting sounds: hollow containers, metal spoons, bells.Pay attention to tactile sensations as well: Your baby will be fascinated by a greeting card laced with glitter or the slickness of Mom's enameled jewelry box. A baby with strands of cooked spaghetti to play with wouldn't notice if a bomb went off.",'2015-11-04','11:45','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg',''),
(13, 3, "I Can Control the World","Babies love cause and effect at this age, as in: I do this, the light comes on. I do that, the light goes off. Showing your baby how to work light switches, remote controls, cell phones, and more will thrill him — but can make life more difficult for you when he insists on being held up to work the lights yet again. Instead, you may want to offer a toy phone or remote to satisfy his craving for control, or a jack-in-the-box to provide a thrillingly surprising result. Or, let him manage his environment by filling a low-lying cabinet or drawer with safe objects and letting your baby rummage around. Make sure there are no sharp edges or other dangers (dressers with drawers pulled out can turn over on a child) and then let your baby go to town.",'2015-11-03','11:45','http://theartmad.com/wp-content/uploads/2015/02/Newborn-Baby-34.jpg','' );



INSERT INTO `pretplata` (`uzrast_id`, `korisnik_id`,`pretplacen`) VALUES
(1, 3, 1),
(2, 3, 1),
(3, 3, 1),
(1, 8, 0),
(2, 8, 1),
(3, 4, 1),
(4, 4, 1),
(5, 4, 1),
(1, 4, 1),
(2, 4, 1),
(1, 9, 1),
(1, 5, 1),
(2, 5, 1),
(3, 5, 1),
(4, 5, 1),
(5, 5, 1),
(1, 10, 0),
(1, 6, 1),
(2, 6, 1),
(3, 6, 1),
(4, 6, 1),
(5, 6, 1),
(1, 11, 0),
(1, 7, 1),
(2, 7, 1),
(3, 7, 1),
(4, 7, 1),
(5, 7, 1);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
