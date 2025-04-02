<div>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            background: black;
            /* Latar belakang biar loading lebih jelas */
        }

        #screen-game {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            /* Sembunyikan iframe sebelum loading selesai */
        }

        /* Spinner Loading */
        #loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 20px;
            color: white;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
        }

        .border-item {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 20px;
            background-color: black;
        }

        #close-btn {
            position: fixed;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: white;
            background: rgba(0, 0, 0, 0.7);
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            z-index: 1000;
            /* Selalu di atas */
            border-radius: 5px;
        }

        #close-btn:hover {
            background: rgba(255, 0, 0, 0.8);
        }
    </style>

    <button id="close-btn" onclick="closePage()">✖</button>

    <!-- Spinner Loading -->
    <div id="loading">Loading...</div>

    <!-- Iframe (Tidak Diubah) -->
    <div>
        {!! str_replace('<iframe', '<iframe id="screen-game"' , $record->iframe)!!}
    </div>

    <div class="border-item">

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const iframe = document.getElementById('screen-game');
            const loading = document.getElementById('loading');

            // Tampilkan iframe setelah selesai loading
            iframe.onload = function() {
                loading.style.display = 'none'; // Hilangkan loading
                iframe.style.display = 'block'; // Tampilkan iframe
            };

            // Opsional: Bisa tambahin src langsung di sini kalau iframe kosong
            // iframe.src = "URL_IFRAME_ANDA";
        });

        function closePage() {
            window.location.href = '/';
        }
    </script>
</div>