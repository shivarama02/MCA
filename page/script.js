
const contributorsContainer = document.getElementById('contributors-container');
fetch('https://api.github.com/repos/CET-MCA-26/MCA-Laboratory/contributors')
    .then(response => response.json())
    .then(data => {
        contributorsContainer.innerHTML = '';
        data.forEach(contributor => {
            if (contributor.login === "jefintp") {
                return;
            }
            const contributorDiv = document.createElement('div');
            contributorDiv.className = 'contributor';
            contributorDiv.innerHTML = `
                <img src="${contributor.avatar_url}" alt="${contributor.login}">
                <a href="${contributor.html_url}" target="_blank">${contributor.login}</a>
            `;
            contributorsContainer.appendChild(contributorDiv);
        });
    })
    .catch(error => {
        contributorsContainer.innerHTML = '<p>Failed to load contributors.</p>';
        console.error('Error fetching contributors:', error);
    });

    // leaderboard
    const leaderboardTable = document.getElementById('leaderboard').querySelector('tbody');

// Fetch contributors from the GitHub API
fetch('https://api.github.com/repos/CET-MCA-26/MCA-Laboratory/contributors')
    .then(response => response.json())
    .then(data => {
        // Sort contributors by contributions (highest first)
        data.sort((a, b) => b.contributions - a.contributions);

        // Clear the table body
        leaderboardTable.innerHTML = '';

        // Populate the leaderboard
        data.forEach((contributor, index) => {
            if (contributor.login === "jefintp") {
                return;
            }
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>
                    <img src="${contributor.avatar_url}" alt="${contributor.login}" class="contributor-img">
                    <a href="${contributor.html_url}" target="_blank">${contributor.login}</a>
                </td>
                <td>${contributor.contributions}</td>
            `;
            leaderboardTable.appendChild(row);
        });
    })
    .catch(error => {
        leaderboardTable.innerHTML = `
            <tr>
                <td colspan="3" style="text-align: center; color: red;">Failed to load data. Please try again later.</td>
            </tr>
        `;
        console.error('Error fetching contributors:', error);
    });


    document.addEventListener("DOMContentLoaded", function () {
        const snowContainer = document.querySelector(".snow-container");
    
        const particlesPerThousandPixels = 0.1;
        const fallSpeed = 1.25;
        const pauseWhenNotActive = true;
        const maxSnowflakes = 200;
        const snowflakes = [];
    
        let snowflakeInterval;
        let isTabActive = true;
    
        function resetSnowflake(snowflake) {
            const size = Math.random() * 5 + 1;
            const viewportWidth = window.innerWidth - size; // Adjust for snowflake size
            const viewportHeight = window.innerHeight;
    
            snowflake.style.width = `${size}px`;
            snowflake.style.height = `${size}px`;
            snowflake.style.left = `${Math.random() * viewportWidth}px`; // Constrain within viewport width
            snowflake.style.top = `-${size}px`;
    
            const animationDuration = (Math.random() * 3 + 2) / fallSpeed;
            snowflake.style.animationDuration = `${animationDuration}s`;
            snowflake.style.animationTimingFunction = "linear";
            snowflake.style.animationName =
                Math.random() < 0.5 ? "fall" : "diagonal-fall";
    
            setTimeout(() => {
                if (parseInt(snowflake.style.top, 10) < viewportHeight) {
                    resetSnowflake(snowflake);
                } else {
                    snowflake.remove(); // Remove when it goes off the bottom edge
                }
            }, animationDuration * 1000);
        }
    
        function createSnowflake() {
            if (snowflakes.length < maxSnowflakes) {
                const snowflake = document.createElement("div");
                snowflake.classList.add("snowflake");
                snowflakes.push(snowflake);
                snowContainer.appendChild(snowflake);
                resetSnowflake(snowflake);
            }
        }
    
        function generateSnowflakes() {
            const numberOfParticles =
                Math.ceil((window.innerWidth * window.innerHeight) / 1000) *
                particlesPerThousandPixels;
            const interval = 5000 / numberOfParticles;
    
            clearInterval(snowflakeInterval);
            snowflakeInterval = setInterval(() => {
                if (isTabActive && snowflakes.length < maxSnowflakes) {
                    requestAnimationFrame(createSnowflake);
                }
            }, interval);
        }
    
        function handleVisibilityChange() {
            if (!pauseWhenNotActive) return;
    
            isTabActive = !document.hidden;
            if (isTabActive) {
                generateSnowflakes();
            } else {
                clearInterval(snowflakeInterval);
            }
        }
    
        generateSnowflakes();
    
        window.addEventListener("resize", () => {
            clearInterval(snowflakeInterval);
            setTimeout(generateSnowflakes, 1000);
        });
    
        document.addEventListener("visibilitychange", handleVisibilityChange);
    });

   
   