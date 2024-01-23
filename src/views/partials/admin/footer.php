<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                    <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                    <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                    <li class="list-inline-item">
                        <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                            </svg>
                            Sponsor
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Copyright &copy; 2023
                        <a href="." class="link-secondary">Tabler</a>.
                        All rights reserved.
                    </li>
                    <li class="list-inline-item">
                        <a href="./changelog.html" class="link-secondary" rel="noopener">
                            v1.0.0-beta20
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
<script>
    var themeStorageKey = "tablerTheme";
    var defaultTheme = "light";

    // Định nghĩa hàm để thay đổi chủ đề
    function toggleTheme() {
        var selectedTheme = localStorage.getItem(themeStorageKey) || defaultTheme;

        // Đảo ngược giá trị chủ đề
        selectedTheme = selectedTheme === 'dark' ? 'light' : 'dark';

        // Lưu giá trị chủ đề mới vào localStorage
        localStorage.setItem(themeStorageKey, selectedTheme);

        // Thiết lập hoặc xóa thuộc tính data-bs-theme của thẻ body
        if (selectedTheme === 'dark') {
            document.body.setAttribute("data-bs-theme", selectedTheme);
        } else {
            document.body.removeAttribute("data-bs-theme");
        }

        // Cập nhật trạng thái nút
        updateButtonState(selectedTheme);
    }

    // Hàm để cập nhật trạng thái nút
    function updateButtonState(theme) {
        var enableDarkmodeButton = document.getElementById("enableDarkmodeButton");
        var enableLightmodeButton = document.getElementById("enableLightmodeButton");

        if (theme === 'dark') {
            enableDarkmodeButton.style.display = "none";
            enableLightmodeButton.style.display = "block";
            document.body.setAttribute("data-bs-theme", 'dark');
        } else {
            enableDarkmodeButton.style.display = "block";
            enableLightmodeButton.style.display = "none";
        }
    }

    // Khởi tạo trạng thái ban đầu
    updateButtonState(localStorage.getItem(themeStorageKey) || defaultTheme);

    // Gắn sự kiện onclick cho nút enableDarkmodeButton
    var enableDarkmodeButton = document.getElementById("enableDarkmodeButton");
    if (enableDarkmodeButton) {
        enableDarkmodeButton.onclick = function() {
            toggleTheme();
        };
    }

    // Gắn sự kiện onclick cho nút enableLightmodeButton
    var enableLightmodeButton = document.getElementById("enableLightmodeButton");
    if (enableLightmodeButton) {
        enableLightmodeButton.onclick = function() {
            toggleTheme();
        };
    }
</script>
</body>

</html>