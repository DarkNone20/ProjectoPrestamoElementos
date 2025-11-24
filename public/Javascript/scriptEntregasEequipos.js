

        function activarBuscador(inputId, listaId) {
            const input = document.getElementById(inputId);
            const lista = document.getElementById(listaId);

            input.addEventListener("input", function() {
                const term = this.value.trim();

                if (term.length < 1) {
                    lista.classList.add("d-none");
                    return;
                }

                fetch(`/usuarios/buscar?term=${term}`)
                    .then(res => res.json())
                    .then(data => {
                        lista.innerHTML = "";
                        lista.classList.remove("d-none");

                        // ⚠️ NO EXISTE NINGÚN COLABORADOR
                        if (data.length === 0) {
                            lista.innerHTML = `
                        <div class="autocomplete-item text-danger">
                            ❌ No existe ningún colaborador con ese nombre
                        </div>
                    `;
                            return;
                        }

                        // ✔ MOSTRAR COINCIDENCIAS
                        data.forEach(usuario => {
                            let item = document.createElement("div");
                            item.classList.add("autocomplete-item");
                            item.textContent = usuario.Nombre;

                            item.addEventListener("click", () => {
                                input.value = usuario.Nombre;
                                lista.classList.add("d-none");
                            });

                            lista.appendChild(item);
                        });
                    });
            });

            // Ocultar lista si clic fuera
            document.addEventListener("click", function(e) {
                if (e.target !== input && !lista.contains(e.target)) {
                    lista.classList.add("d-none");
                }
            });
        }

        activarBuscador("auxEntrega", "listaEntrega");
        activarBuscador("auxRecibe", "listaRecibe");