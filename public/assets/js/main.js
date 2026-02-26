// Enable syntax highlighting for code examples
hljs.highlightAll();

// Copy code handler
document.querySelectorAll('.copy-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const code = btn.nextElementSibling.innerText;
        navigator.clipboard.writeText(code).then(() => {
            btn.innerText = 'Copied!';
            setTimeout(() => btn.innerHTML = '<i class="bi bi-copy"></i>', 1500);
        });
    });
});

// Sidebar sections expand/collapse
// document.querySelectorAll('.nav-toggle').forEach(toggle => {
//     toggle.addEventListener('click', () => {
//         const sub = toggle.nextElementSibling;
//         sub.style.display = sub.style.display === 'block' ? 'none' : 'block';
//     });
// });

// Version selector handler
document.getElementById('version').addEventListener('change', function() {
    // only 0.1.x is available currently
});

// Smooth scroll to top
document.getElementById('back-to-top').addEventListener('click', function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

/* Table of Content */
document.addEventListener("DOMContentLoaded", () => {
    const headings = document.querySelectorAll("h3");
    const toc = document.getElementById("toc");
    const list = document.getElementById("toc-list");

    // Hide TOC if no sections exist
    if (!headings.length) {
        toc.remove();
        return;
    }

    headings.forEach((heading, index) => {
        // Create ID if missing
        if (!heading.id) {
            heading.id = "section-" + (index + 1);
        }

        // Create list item
        const li = document.createElement("li");
        const a = document.createElement("a");

        a.href = "#" + heading.id;
        a.textContent = heading.textContent;

        li.appendChild(a);
        list.appendChild(li);
    });

    // Show TOC
    toc.hidden = false;
});
