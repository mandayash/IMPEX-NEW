// Import Bootstrap dari node_modules (jika diperlukan)
import 'bootstrap';

// Kode untuk dropdown
document.addEventListener('DOMContentLoaded', function() {
    var dropdownElementList = document.querySelectorAll('.dropdown-toggle');
    dropdownElementList.forEach(function(dropdownToggle) {
        new bootstrap.Dropdown(dropdownToggle);
    });
});
