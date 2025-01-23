let isDragging = false;
let startX = 0;
let scrollLeft = 0;

// Pilih semua elemen dengan class '.card-section'
const cardSections = document.querySelectorAll(".card-section");

// Menambahkan event listener untuk setiap '.card-section'
cardSections.forEach((cardSection) => {
    // Event saat mouse button ditekan (mousedown)
    cardSection.addEventListener("mousedown", (e) => {
        isDragging = true;
        startX = e.pageX - cardSection.offsetLeft;
        scrollLeft = cardSection.scrollLeft;
        cardSection.style.cursor = "grabbing"; // Ganti kursor menjadi grabbing
        e.preventDefault(); // Mencegah seleksi pada saat mulai dragging
    });

    // Event saat mouse keluar dari area container (mouseleave)
    cardSection.addEventListener("mouseleave", () => {
        isDragging = false;
        cardSection.style.cursor = "default"; // Kembalikan kursor ke default
    });

    // Event saat mouse button dilepas (mouseup)
    cardSection.addEventListener("mouseup", () => {
        isDragging = false;
        cardSection.style.cursor = "default"; // Kembalikan kursor ke default
    });

    // Event saat mouse bergerak (mousemove)
    cardSection.addEventListener("mousemove", (e) => {
        if (!isDragging) return;

        e.preventDefault(); // Mencegah seleksi teks atau elemen lainnya
        const x = e.pageX - cardSection.offsetLeft;
        const walk = (x - startX) * 2; // Kecepatan geser kartu lebih cepat
        cardSection.scrollLeft = scrollLeft - walk; // Update scrollLeft untuk menggeser kartu
    });
});
