<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halloween Festival 🎃</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <main>
        <section id="about" class="section">
            <h2>About the Halloween Festival: Where the Magic Begins!</h2>
            <p>
                As the leaves turn to ash and the **full moon rises high**, our town undergoes a thrilling transformation! This isn't just an event; it's the annual **Halloween Festival**, a night dedicated to spine-chilling laughter, delightful mischief, and, most importantly, a mountain of candy! 🎃 We invite all of you—families, friends, and the peculiar creatures of the night—to join us. Come share a scary ghost story, watch the dazzling costume parades, and experience the pure, giddy thrill of the season.
            </p>
            <blockquote class="spooky-quote">
                "I think that we're all, at heart, the same kids we were. It's just that the costumes are more expensive now."
                <cite>— Stephen King</cite>
            </blockquote>
            <p>
                Dust off your inner child and let the haunting commence!
            </p>
            <img src="images/pumpkin.png" alt="Pumpkin" class="festival-img">
        </section>

        <section id="events" class="section">
            <h2>Festival Events: Dare to Participate!</h2>
            <ul class="event-list">
                <li>
                    <h3>🧙‍♀️ The Grand Costume Contest: Show Your Spirit!</h3>
                    <p>
                        It's your moment to shine! Step into the spotlight and showcase your creation, whether it's the **spookiest monster**, the **funniest pun-costume**, or the **most meticulously crafted masterpiece**. This contest is truly the heart of our festival, and we welcome everyone from wicked witches to friendly ghosts. 
                    </p>
                    <blockquote class="spooky-quote">
                        "Come, little children, I'll take thee away..."
                        <cite>— Sarah Sanderson, *Hocus Pocus* (1993)</cite>
                    </blockquote>
                    <p>
                        Winners in all categories receive a magnificent, mysterious, candy-filled prize bag! 🎁
                    </p>
                    <img src="images/costume.png" alt="Costume Contest" class="event-img">
                </li>

                <li>
                    <h3>🏚️ The Haunted House: Enter If You DARE</h3>
                    <p>
                        Think you're brave? We double-dare you to enter the chilling depths of the **Haunted Mansion**! Our volunteers have gone all out this year; every creaking floorboard and dark corner hides a new, terrifying scare. You'll navigate dimly lit hallways, hear bloodcurdling, unfamiliar sounds, and meet a few... *unwanted* guests.
                    </p>
                    <blockquote class="spooky-quote">
                        "Life's no fun without a good scare!"
                        <cite>— The Mayor, *The Nightmare Before Christmas*</cite>
                    </blockquote>
                    <p>
                        Grab a friend's hand and see if you can make it out alive—your screams are our biggest compliment! 👻
                    </p>
                    <img src="images/house.png" alt="Haunted House" class="event-img">
                </li>

                <li>
                    <h3>🍬 Trick-or-Treat Lane: A Sweet & Safe Adventure</h3>
                    <p>
                        This is our most cherished tradition! We've created a safe, well-lit, and incredibly fun adventure for all ages. Wander through our designated **candy-filled lanes**, say "Trick or Treat" to our cheerful (and sometimes silly) monsters, and leave with a bag absolutely brimming with sweet surprises. 
                    </p>
                    <blockquote class="spooky-quote">
                        "All you need is love. But a little chocolate now and then doesn't hurt."
                        <cite>— Charles Schulz (Peanuts)</cite>
                    </blockquote>
                    <p>
                        It's perfect for the littlest trick-or-treaters and, let's be honest, those of us who are still kids at heart! Come fill your bags and your hearts! 🧡
                    </p>
                    <img src="images/trickORtreat.jpg" alt="Trick or Treat Lane" class="event-img">
                </li>
            </ul>
        </section>

        <section id="trick_or_treat" class="section">
            <h2>The Trick or Treat Game: A Fateful Encounter</h2>
            <p>
                The ancient spirits are watching your every move tonight... Are you feeling lucky enough to challenge them? Enter your Halloween alias below and let the forces of fate decide: will you receive a **sweet, delicious treat 🍫** or a slightly more mischievous **spooky trick 👻**? We track every single result on our community leaderboard, so choose your name wisely.
            </p>
            <p>
                **Give it a shot—what's the worst that could happen?**
            </p>

            <form id="trickOrTreatForm">
                <input type="text" id="name" name="name" placeholder="Enter your spooky alias" required>
                <button type="submit">🎃 Trick or Treat!</button>
            </form>

            <div id="treatResult"></div>
        </section>

        <section id="leaderboard" class="section">
            <h2>Recent Trick-or-Treat Results 🏆: Who Got the Candy?</h2>
            <p>
                Check out the latest fortunes—or perhaps misfortunes—of your fellow festival-goers! Will your name make it to the top of the "Treat" list, or will you be crowned the Queen or King of the "Trick"? This data updates automatically. Good luck to all!
            </p>
            <ul id="recentResults">
                <li>Loading latest Halloween fortunes...</li>
            </ul>
        </section>

        <button id="themeToggle" class="theme-btn">🌓 Toggle Light/Dark Theme</button>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>