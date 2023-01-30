<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <img src="..." class="rounded mr-2" alt="...">
        <strong class="mr-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        Hello, world! This is a toast message.
    </div>
</div>


<script>
    function showSuccessToast(title,message) {
        toast({
            title: title,
            message: message,
            type: "success",
            duration: 5000
        });
    }
    function showErrorToast(title,message) {
        toast({
            title: title,
            message: message,
            type: "error",
            duration: 5000
        });
    }
</script>
<style>

    /* ======= Toast message ======== */

    #toast {
        position: fixed;
        top: 300px;
        right: 300px;
        z-index: 999999;
    }

    .toast {
        display: flex;
        align-items: center;
        background-color: black;
        border-radius: 2px;
        padding: 20px 0;
        min-width: 400px;
        max-width: 450px;
        border-left: 4px solid;
        box-shadow: 0 5px 8px rgba(0, 0, 0, 0.08);
        transition: all linear 0.3s;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(calc(100% + 32px));
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeOut {
        to {
            opacity: 0;
        }
    }

    .toast--success {
        border-color: #47d864;
    }

    .toast--success .toast__icon {
        color: #47d864;
    }

    .toast--info {
        border-color: #2f86eb;
    }

    .toast--info .toast__icon {
        color: #2f86eb;
    }

    .toast--warning {
        border-color: #ffc021;
    }

    .toast--warning .toast__icon {
        color: #ffc021;
    }

    .toast--error {
        border-color: #ff623d;
    }

    .toast--error .toast__icon {
        color: #ff623d;
    }

    .toast + .toast {
        margin-top: 24px;
    }

    .toast__icon {
        font-size: 24px;
    }

    .toast__icon,
    .toast__close {
        padding: 0 16px;
    }

    .toast__body {
        flex-grow: 1;
    }

    .toast__title {
        font-size: 16px;
        font-weight: 600;
        color: #333;
    }

    .toast__msg {
        font-size: 14px;
        color: #888;
        margin-top: 6px;
        line-height: 1.5;
    }

    .toast__close {
        font-size: 20px;
        color: rgba(0, 0, 0, 0.3);
        cursor: pointer;
    }

</style>
<script>
    // Toast function
    function toast({ title = "", message = "", type = "info", duration = 3000 }) {
        const main = document.getElementById("toast");
        if (main) {
            const toast = document.createElement("div");

            // Auto remove toast
            const autoRemoveId = setTimeout(function () {
                main.removeChild(toast);
            }, duration + 1000);

            // Remove toast when clicked
            toast.onclick = function (e) {
                if (e.target.closest(".toast__close")) {
                    main.removeChild(toast);
                    clearTimeout(autoRemoveId);
                }
            };

            const icons = {
                success: "fas fa-check-circle",
                info: "fas fa-info-circle",
                warning: "fas fa-exclamation-circle",
                error: "fas fa-exclamation-circle"
            };
            const icon = icons[type];
            const delay = (duration / 1000).toFixed(2);

            toast.classList.add("toast", `toast--${type}`);
            toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

            toast.innerHTML = `
                    <div class="toast__icon">
                        <i class="${icon}"></i>
                    </div>
                    <div class="toast__body">
                        <h3 class="toast__title">${title}</h3>
                        <p class="toast__msg">${message}</p>
                    </div>
                    <div class="toast__close">
                        <i class="fas fa-times"></i>
                    </div>
                `;
            main.appendChild(toast);
        }
    }

</script>