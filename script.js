document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;
    const toggleBtn = document.getElementById('themeToggle');
    const form = document.getElementById('trickOrTreatForm');
    const resultDiv = document.getElementById('treatResult');
    const resultsList = document.getElementById('recentResults');

    // Restore saved theme
    if (localStorage.getItem('theme') === 'light') body.classList.add('light');

    // Toggle theme
    toggleBtn.addEventListener('click', () => {
        body.classList.toggle('light');
        localStorage.setItem('theme', body.classList.contains('light') ? 'light' : 'dark');
    });

    // Load results - UPDATED TO PROCESS JSON
    function loadResults() {
        fetch('trick_or_treat.php?getResults=true')
            .then(res => {
                if (!res.ok) throw new Error('Network response was not ok');
                return res.json();
            })
            .then(results => {
                resultsList.innerHTML = '';
                if (!results || results.length === 0) {
                    resultsList.innerHTML = '<li>No results yet! Be the first 🎃</li>';
                    return;
                }
                
                results.forEach(item => { 
                    const li = document.createElement('li');
                    li.innerHTML = `<strong>${item.name}</strong> got ${item.result}`; 
                    resultsList.appendChild(li);
                });
            })
            .catch((error) => {
                console.error("Error loading results:", error);
                resultsList.innerHTML = '<li>Error loading results 💀</li>';
            });
    }

    // Handle Trick or Treat form
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(form);

        fetch('trick_or_treat.php', { method: 'POST', body: formData })
            .then(response => response.text()) // Expecting HTML/text output from POST
            .then(data => {
                resultDiv.innerHTML = data;
                
                // Trigger animations based on the text content
                if (data.toLowerCase().includes('trick')) triggerTrickEffect();
                else if (data.toLowerCase().includes('treat')) triggerTreatEffect();
                
                loadResults(); // Reload the leaderboard after a new result is saved
                triggerPumpkinFloat();
            })
            .catch(() => {
                resultDiv.innerHTML = '<p>An error occurred. Please try again.</p>';
            });
    });

    // 👻 Trick animation
    function triggerTrickEffect() {
        let flashCount = 0;
        const interval = setInterval(() => {
            body.style.backgroundColor = flashCount % 2 === 0 ? '#ff0000' : '#000000';
            flashCount++;
            if (flashCount > 6) {
                clearInterval(interval);
                body.style.backgroundColor = '';
            }
        }, 200);

        const ghost = document.createElement('img');
        ghost.src = 'https://upload.wikimedia.org/wikipedia/commons/0/07/Ghost-Emoji.png';
        ghost.classList.add('floating-ghost');
        document.body.appendChild(ghost);
        setTimeout(() => ghost.remove(), 4000);
    }

    // 🍬 Treat animation
    function triggerTreatEffect() {
        for (let i = 0; i < 25; i++) {
            const candy = document.createElement('div');
            candy.classList.add('candy');
            candy.textContent = '🍬';
            candy.style.left = Math.random() * 100 + 'vw';
            candy.style.animationDuration = (Math.random() * 3 + 2) + 's';
            document.body.appendChild(candy);
            setTimeout(() => candy.remove(), 5000);
        }
    }

    // 🎃 Floating pumpkins
    function triggerPumpkinFloat() {
        for (let i = 0; i < 5; i++) {
            const pumpkin = document.createElement('div');
            pumpkin.classList.add('pumpkin');
            pumpkin.textContent = '🎃';
            pumpkin.style.left = Math.random() * 100 + 'vw';
            pumpkin.style.top = Math.random() * 80 + 'vh';
            pumpkin.style.animationDuration = (Math.random() * 3 + 2) + 's';
            document.body.appendChild(pumpkin);
            setTimeout(() => pumpkin.remove(), 4000);
        }
    }

    loadResults();
});