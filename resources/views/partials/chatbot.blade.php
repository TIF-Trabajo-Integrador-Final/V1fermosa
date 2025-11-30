<!-- BOTÓN FLOTANTE DEL CHAT (con robot svg) -->
<button id="chat-toggle" onclick="toggleChat()"
    class="fixed bottom-6 right-6 z-50 group flex items-center justify-center transition-all duration-300 hover:scale-110 focus:outline-none">

    <!-- Tooltip -->
    <span class="absolute right-16 bg-white text-[#131567] text-xs font-bold px-3 py-2 rounded-lg shadow-lg 
                 opacity-0 group-hover:opacity-100 transition-opacity duration-300 w-max pointer-events-none font-montserrat">
        ¿Necesitás ayuda?
    </span>

    <!-- Icono redondo -->
    <div class="w-14 h-14 bg-[#131567] rounded-full shadow-[0_4px_14px_rgba(19,21,103,0.4)]
                flex items-center justify-center overflow-hidden relative border-2 border-white">

        <!-- Robot institucional -->
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
            <circle cx="12" cy="12" r="9" stroke="white" stroke-width="2"/>
            <circle cx="9" cy="10" r="1.2" fill="white"/>
            <circle cx="15" cy="10" r="1.2" fill="white"/>
            <path d="M8 15c1.5 1.3 6.5 1.3 8 0" stroke="white" stroke-width="2" stroke-linecap="round"/>
            <rect x="10.5" y="2" width="3" height="4" rx="1" fill="white"/>
        </svg>
    </div>
</button>



<!-- ======================================= -->
<!-- VENTANA DEL CHAT -->
<!-- ======================================= -->
<div id="chat-window" 
     class="fixed bottom-24 right-6 w-80 md:w-96 bg-white rounded-2xl shadow-2xl z-50 overflow-hidden 
            transform scale-0 origin-bottom-right transition-transform duration-300 border border-gray-200 hidden">

    
    <!-- ======================================= -->
    <!-- ENCABEZADO DEL CHAT -->
    <!-- ======================================= -->
    <div class="bg-[#131567] p-4 flex items-center justify-between">
        
        <div class="flex items-center gap-3">

            <!-- Avatar Robot -->
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center overflow-hidden shadow">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="9" stroke="#131567" stroke-width="2"/>
                    <circle cx="9" cy="10" r="1.2" fill="#131567"/>
                    <circle cx="15" cy="10" r="1.2" fill="#131567"/>
                    <path d="M8 15c1.5 1.3 6.5 1.3 8 0" stroke="#131567" stroke-width="2" stroke-linecap="round"/>
                    <rect x="10.5" y="2" width="3" height="4" rx="1" fill="#131567"/>
                </svg>
            </div>

            <div>
                <h4 class="text-white font-bold text-sm font-montserrat">Asistente Virtual</h4>
                <p class="text-blue-200 text-xs flex items-center gap-1 font-montserrat">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span> En línea
                </p>
            </div>
        </div>

        <!-- Botón cerrar -->
        <button onclick="toggleChat()" class="text-white hover:text-gray-300">
            <i class="fas fa-times"></i>
        </button>
    </div>


    <!-- ======================================= -->
    <!-- MENSAJES -->
    <!-- ======================================= -->
    <div id="chat-messages" class="h-80 overflow-y-auto p-4 bg-[#f4f5f7] space-y-4 font-montserrat">

        <!-- MENSAJE INICIAL DEL BOT -->
          <div id="chat-messages" class="h-80 overflow-y-auto p-4 bg-[#f4f5f7] space-y-4 font-montserrat">

    <!-- MENSAJE INICIAL DEL BOT -->
    <div class="flex items-start gap-3 animate-fade-in-up">

        <!-- Robot -->
        <div class="w-10 h-10 bg-white border border-[#131567]/40 rounded-full flex items-center justify-center shadow-sm">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                <circle cx="12" cy="12" r="10" stroke="#131567" stroke-width="2"/>
                <circle cx="9" cy="10" r="1.2" fill="#131567"/>
                <circle cx="15" cy="10" r="1.2" fill="#131567"/>
                <path d="M8 15c1.5 1.4 6.5 1.4 8 0" stroke="#131567" stroke-width="2" stroke-linecap="round"/>
                <rect x="10.5" y="2" width="3" height="4" rx="1" fill="#131567"/>
            </svg>
        </div>

        <div class="bg-white p-3 rounded-tr-xl rounded-br-xl rounded-bl-xl shadow-sm 
                    text-sm text-gray-700 max-w-[85%] border border-gray-200 leading-relaxed font-montserrat">
            
            <strong class="text-[#131567]">¡Hola! 😊</strong><br>
            Para comenzar escribí: <strong>"Hola tu nombre"</strong><br><br>
            Ejemplo: <strong>Hola María</strong>
        </div>
    </div>

</div>

    </div>


    <!-- ======================================= -->
    <!-- INPUT DE TEXTO -->
    <!-- ======================================= -->
    <div class="p-3 bg-white border-t border-gray-100">
        <form id="chat-form" onsubmit="handleUserMessage(event)" class="flex gap-2">
            <input type="text" id="user-input" 
                   class="w-full bg-gray-100 text-gray-700 text-sm rounded-full px-4 py-2 
                          focus:outline-none focus:ring-2 focus:ring-[#131567]/50 font-montserrat"
                   placeholder="Escribe un mensaje..." autocomplete="off">

            <button type="submit" 
                    class="bg-[#131567] text-white w-10 h-10 rounded-full flex items-center justify-center 
                           hover:bg-blue-900 transition flex-shrink-0">
                <i class="fas fa-paper-plane text-xs"></i>
            </button>
        </form>
    </div>
</div>




<!-- ====================================================== -->
<!-- JS DEL CHATBOT -->
<!-- ====================================================== -->
<script>
    const chatWindow = document.getElementById('chat-window');
    const chatMessages = document.getElementById('chat-messages');
    const userInput = document.getElementById('user-input');

    let userName = null; // guardaremos el nombre del usuario
    const phoneNumber = "543704699344";

    /* ============================= */
    /* ABRIR / CERRAR CHAT          */
    /* ============================= */
    function toggleChat() {
        if (chatWindow.classList.contains('hidden')) {
            chatWindow.classList.remove('hidden');
            setTimeout(() => chatWindow.classList.remove('scale-0'), 10);
        } else {
            chatWindow.classList.add('scale-0');
            setTimeout(() => chatWindow.classList.add('hidden'), 300);
        }
    }


    /* ============================= */
    /* MANEJAR MENSAJE DEL USUARIO  */
    /* ============================= */
    function handleUserMessage(e) {
        e.preventDefault();
        const text = userInput.value.trim();
        if (!text) return;

        addMessage(text, 'user');
        userInput.value = '';

        showTyping();

        setTimeout(() => {
            removeTyping();

            const lower = text.toLowerCase();

            /* =============================================== */
            /* 1) FLUJO PRINCIPAL:  “HOLA + NOMBRE”             */
            /* =============================================== */
            if (lower.startsWith("hola")) {

                // extraer el posible nombre ingresado
                let nombre = text
                    .replace(/hola/i, "")
                    .replace(/soy/i, "")
                    .replace(/me llamo/i, "")
                    .replace(/mi nombre es/i, "")
                    .trim();

                if (!nombre) {
                    // escribió solo "hola" sin nombre
                    addMessage(`
                        ¡Hola! 😊<br>
                        Para comenzar escribí: <strong>"Hola tu nombre"</strong><br><br>
                        Ejemplo: <strong>Hola María</strong>
                    `, 'bot', true);
                    return;
                }

                // capitalizar nombre
                nombre = nombre.charAt(0).toUpperCase() + nombre.slice(1);
                userName = nombre;

                addMessage(`
                    Hola <strong>${nombre}</strong> 😊 ¿En qué puedo ayudarte?<br><br>
                    Cuando quieras ver las opciones institucionales escribí <strong>"Opciones"</strong>.
                `, 'bot', true);

                return;
            }


            /* =============================================== */
            /* 2) MENÚ DE OPCIONES                             */
            /* =============================================== */
            if (lower === "opciones") {
                showMenuOptions();
                return;
            }


            /* =============================================== */
            /* 3) MENSAJE POR DEFECTO                          */
            /* =============================================== */
            addMessage(`
                No entiendo esa consulta 😅<br>
                Para comenzar escribí <strong>"Hola tu nombre"</strong><br>
                Ejemplo: <strong>Hola Sofía</strong>
            `, 'bot', true);

        }, 900);
    }


    /* ============================= */
    /* MENU DE OPCIONES             */
    /* ============================= */
    function showMenuOptions() {
        const menuHTML = `
            <p class="mb-2 font-montserrat">Seleccioná una opción para hablar con un asesor por WhatsApp:</p>
            <div class="flex flex-col gap-2 mt-2 font-montserrat">

                <button onclick="redirectToWsp('Hola, quisiera información sobre los Aranceles.')"
                    class="bg-[#131567] text-white text-sm py-2 px-3 rounded-lg hover:bg-blue-900 transition shadow-md flex justify-between">
                    📝 Aranceles <i class="fab fa-whatsapp"></i>
                </button>

                <button onclick="redirectToWsp('Hola, quisiera información sobre Inscripciones.')"
                    class="bg-[#131567] text-white text-sm py-2 px-3 rounded-lg hover:bg-blue-900 transition shadow-md flex justify-between">
                    🎓 Inscripciones <i class="fab fa-whatsapp"></i>
                </button>

                <button onclick="redirectToWsp('Hola, tengo una consulta general.')"
                    class="bg-white border border-[#131567] text-[#131567] text-sm py-2 px-3 rounded-lg hover:bg-gray-50 transition flex justify-between">
                    🙋‍♂️ Otra consulta <i class="fas fa-chevron-right"></i>
                </button>

            </div>
        `;
        addMessage(menuHTML, 'bot', true);
    }


    /* ============================= */
    /* AGREGAR MENSAJE AL CHAT      */
    /* ============================= */
    function addMessage(text, sender, isHTML = false) {
        const div = document.createElement('div');
        div.className = `flex ${sender === 'user' ? 'justify-end' : 'items-start'} gap-2 animate-fade-in-up`;

        let bubbleClass = sender === 'user'
            ? 'bg-[#131567] text-white rounded-tl-xl rounded-tr-xl rounded-bl-xl'
            : 'bg-white text-gray-700 border border-gray-200 rounded-tr-xl rounded-br-xl rounded-bl-xl';

        div.innerHTML = `
            <div class="${bubbleClass} p-3 shadow-sm text-sm max-w-[85%] font-montserrat leading-relaxed">
                ${isHTML ? text : text}
            </div>
        `;

        chatMessages.appendChild(div);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }


    /* ============================= */
    /* ANIMACIÓN DE ESCRITURA       */
    /* ============================= */
    function showTyping() {
        const div = document.createElement('div');
        div.id = 'typing-indicator';
        div.className = 'flex items-start gap-2';

        div.innerHTML = `
            <div class="bg-white p-3 rounded-xl shadow-sm border border-gray-200 w-fit">
                <div class="flex gap-1">
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce delay-75"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce delay-150"></div>
                </div>
            </div>
        `;

        chatMessages.appendChild(div);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function removeTyping() {
        const t = document.getElementById('typing-indicator');
        if (t) t.remove();
    }


    /* ============================= */
    /* REDIRECCIÓN A WHATSAPP       */
    /* ============================= */
    function redirectToWsp(msg) {
        window.open(`https://wa.me/${phoneNumber}?text=${encodeURIComponent(msg)}`, "_blank");
    }
</script>
