(function (global) {
    // --- НАЧАЛО: БЛОК ПРОВЕРКИ RETENTION ---
    if (localStorage.getItem("RETENTION_DISABLED_KEY")) {
        return;
    }
    // ----------------------------------------

    const POPUP_ID = 'form-wrap2';
    let isTrapped = false;

    /**
     * Показывает попап с формой
     */
    function showPopup() {
        const popup = document.getElementById(POPUP_ID);
        if (!popup) {
            return;
        }

        popup.classList.remove('none');
        popup.classList.add('popup-open'); // Используем класс для стилей

        const form = popup.querySelector('form');
        if (form) {
            // Добавляем кнопку закрытия, если её нет
            if (!form.querySelector('.popup-close-btn')) {
                const closeBtn = document.createElement('div');
                closeBtn.className = 'popup-close-btn';
                closeBtn.innerHTML = '&times;';
                closeBtn.style.position = 'absolute';
                closeBtn.style.top = '10px';
                closeBtn.style.right = '15px';
                closeBtn.style.fontSize = '30px';
                closeBtn.style.lineHeight = '30px';
                closeBtn.style.cursor = 'pointer';
                closeBtn.style.color = '#333';
                closeBtn.style.fontWeight = 'bold';
                closeBtn.style.zIndex = '1000';

                closeBtn.onclick = function () {
                    popup.classList.remove('popup-open');
                    popup.classList.add('none');
                };

                form.appendChild(closeBtn);
            }
        }
    }

    /**
     * Создает запись в истории (ловушку)
     */
    function armTrap() {
        if (isTrapped) {
            return;
        }

        try {
            global.history.pushState({ trap: true }, "", global.location.href);
            isTrapped = true;
        } catch (e) {
            // Ignore errors
        }
    }

    /**
     * Обработчик нажатия кнопки "Назад"
     */
    global.addEventListener('popstate', function (e) {
        // Показываем попап
        showPopup();

        // Снова "взводим" ловушку
        try {
            global.history.pushState({ trap: true }, "", global.location.href);
        } catch (e) {
            // Ignore errors
        }
    });

    /**
     * Инициализация
     */
    function init() {
        // Пытаемся установить ловушку сразу
        armTrap();

        // Устанавливаем ловушку при любом взаимодействии пользователя
        const triggers = ['click', 'touchstart', 'scroll', 'mousemove', 'keydown'];
        triggers.forEach(evt => {
            document.addEventListener(evt, function (e) {
                armTrap();
            }, { once: true, passive: true });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Отключение ловушки при отправке формы
    document.addEventListener('submit', function () {
        localStorage.setItem("RETENTION_DISABLED_KEY", "true");
    });

})(window);
