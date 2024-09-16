/* script.js */

function scrollToFooter(section) {
    const footerSection = document.getElementById(section);
    if (footerSection) {
        footerSection.scrollIntoView({ behavior: "smooth" });
    }
}

function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    if (sidebar.style.width === "0px" || sidebar.style.width === "") {
        sidebar.style.width = "250px";
    } else {
        sidebar.style.width = "0px";
    }
}

function showLevels(filiere) {
    const levels = ['Niveau 1', 'Niveau 2', 'Niveau 3', 'Niveau 4'];
    let levelHtml = `<h2>${filiere}</h2><ul>`;
    levels.forEach(level => {
        levelHtml += `<li><a href="EPREUVES.php" onclick="openExamPage('${filiere}', '${level}')">${level}</a></li>`;
    });
    levelHtml += '</ul>';
    document.getElementById('levels').innerHTML = levelHtml;

    const levelSidebar = document.getElementById("levelSidebar");
    levelSidebar.style.width = "200px";
}

function closeLevelSidebar() {
    const levelSidebar = document.getElementById("levelSidebar");
    levelSidebar.style.width = "0px";
}

function openExamPage(filiere, niveau) {
    // Ici, rediriger vers la page des examens en fonction de la filière et du niveau
    window.location.href = `EPREUVES.php?filiere=${encodeURIComponent(filiere)}&niveau=${encodeURIComponent(niveau)}`;
}

