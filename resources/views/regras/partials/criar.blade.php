 <button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal"
     data-bs-target="#kt_modal_add_role">
     <!--begin::Illustration-->
     <img src="assets/media/illustrations/sketchy-1/4.png" alt="" class="mw-100 mh-150px mb-7" />
     <!--end::Illustration-->
     <!--begin::Label-->
     <div class="fw-bold fs-3 text-gray-600 text-hover-primary">Criar nova regra
     </div>
     <!--end::Label-->
 </button>
 <!--begin::Modal-->
 <div class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
     <!--begin::Modal dialog-->
     <div class="modal-dialog modal-dialog-centered mw-750px">
         <!--begin::Modal content-->
         <div class="modal-content">
             <!--begin::Modal header-->
             <div class="modal-header">
                 <!--begin::Modal title-->
                 <h2 class="fw-bold">Adionar Regra</h2>
                 <!--end::Modal title-->
                 <!--begin::Close-->
                 <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                     <i class="ki-duotone ki-cross fs-1">
                         <span class="path1"></span>
                         <span class="path2"></span>
                     </i>
                 </div>
                 <!--end::Close-->
             </div>
             <!--end::Modal header-->
             <!--begin::Modal body-->
             <div class="modal-body scroll-y mx-lg-5 my-7">
                 <!--begin::Form-->
                 @include('regras.partials.formulario')
                 <!--end::Form-->
             </div>
             <!--end::Modal body-->
         </div>
         <!--end::Modal content-->
     </div>
     <!--end::Modal dialog-->
 </div>
 <!--end::Modal-->

 {{-- <script>
     document.addEventListener("DOMContentLoaded", function() {
         const modalElement = document.getElementById("kt_modal_add_role");
         const formElement = modalElement.querySelector("#kt_modal_add_role_form");
         const modalInstance = new bootstrap.Modal(modalElement);
         const validation = FormValidation.formValidation(formElement, {
             fields: {
                 name: { // Atenção para o nome correto do campo, que deve ser 'name' e não 'role_name'
                     validators: {
                         notEmpty: {
                             message: "Role name is required"
                         }
                     }
                 }
             },
             plugins: {
                 trigger: new FormValidation.plugins.Trigger(),
                 bootstrap: new FormValidation.plugins.Bootstrap5({
                     rowSelector: ".fv-row",
                     eleInvalidClass: "",
                     eleValidClass: ""
                 })
             }
         });

         function submitForm() {
             validation.validate().then(status => {
                 if (status === 'Valid') {
                     formElement
                 .submit(); // Isso vai realmente enviar o formulário se a validação passar
                 } else {
                     showErrorAlert();
                 }
             });
         }

         function showErrorAlert() {
             Swal.fire({
                 text: "Sorry, looks like there are some errors detected, please try again.",
                 icon: "error",
                 buttonsStyling: false,
                 confirmButtonText: "Ok, got it!",
                 customClass: {
                     confirmButton: "btn btn-primary"
                 }
             });
         }

         document.querySelector('[data-kt-roles-modal-action="submit"]').addEventListener("click", function(
             event) {
             event
         .preventDefault(); // Mantenha preventDefault aqui para não enviar o formulário antes da validação
             submitForm();
         });

         setupSelectAllCheckbox();
     });

     function setupSelectAllCheckbox() {
         const selectAllCheckbox = document.getElementById('kt_roles_select_all');
         selectAllCheckbox.addEventListener('change', function() {
             document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
                 checkbox.checked = this.checked;
             });
         });
     }
 </script> --}}

 {{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const formElement = document.getElementById("kt_modal_add_role_form");
        const validation = FormValidation.formValidation(formElement, {
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: "O nome da regra é obrigatório"
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".fv-row",
                    eleInvalidClass: "",
                    eleValidClass: ""
                })
            }
        });

        function submitForm() {
            validation.validate().then(status => {
                if (status === 'Valid') {
                    Swal.fire({
                        title: 'Você tem certeza?',
                        text: "Você está prestes a submeter este formulário!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim, submeter!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            formElement.submit();
                        }
                    });
                } else {
                    showErrorAlert();
                }
            });
        }

        function showErrorAlert() {
            Swal.fire({
                text: "Parece que há alguns erros detectados, por favor tente novamente.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, entendi",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }

        document.querySelector('[data-kt-roles-modal-action="submit"]').addEventListener("click", function(
            event) {
            event.preventDefault();
            submitForm();
        });

        document.querySelector('[data-kt-roles-modal-action="cancel"]').addEventListener("click", function(
            event) {
            event.preventDefault();
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Você deseja descartar as alterações?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Descartar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    formElement.reset();
                }
            });
        });

        function setupSelectAllCheckbox() {
            const selectAllCheckbox = document.getElementById('kt_roles_select_all');
            selectAllCheckbox.addEventListener('change', function() {
                document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
        }

        setupSelectAllCheckbox();
    });
</script> --}}

 <script>
     document.addEventListener("DOMContentLoaded", function() {
         const formElement = document.getElementById("kt_modal_add_role_form");
         const modalInstance = new bootstrap.Modal(document.getElementById("kt_modal_add_role"));
         const validation = FormValidation.formValidation(formElement, {
             fields: {
                 name: {
                     validators: {
                         notEmpty: {
                             message: "O nome da regra é obrigatório"
                         }
                     }
                 }
             },
             plugins: {
                 trigger: new FormValidation.plugins.Trigger(),
                 bootstrap: new FormValidation.plugins.Bootstrap5({
                     rowSelector: ".fv-row",
                     eleInvalidClass: "",
                     eleValidClass: ""
                 })
             }
         });

         function submitForm() {
             validation.validate().then(status => {
                 if (status === 'Valid') {
                     Swal.fire({
                         title: 'Você tem certeza?',
                         text: "Você está prestes a submeter este formulário!",
                         icon: 'question',
                         showCancelButton: true,
                         confirmButtonColor: '#3085d6',
                         cancelButtonColor: '#d33',
                         confirmButtonText: 'Sim, submeter!',
                         cancelButtonText: 'Cancelar'
                     }).then((result) => {
                         if (result.isConfirmed) {
                             formElement.submit();
                         }
                     });
                 } else {
                     showErrorAlert();
                 }
             });
         }

         function showErrorAlert() {
             Swal.fire({
                 text: "Parece que há alguns erros detectados, por favor tente novamente.",
                 icon: "error",
                 buttonsStyling: false,
                 confirmButtonText: "Ok, entendi",
                 customClass: {
                     confirmButton: "btn btn-primary"
                 }
             });
         }

         document.querySelector('[data-kt-roles-modal-action="submit"]').addEventListener("click", function(
             event) {
             event.preventDefault();
             submitForm();
         });

         document.querySelector('[data-kt-roles-modal-action="cancel"]').addEventListener("click", function(
             event) {
             event.preventDefault();
             Swal.fire({
                 title: 'Você tem certeza?',
                 text: "Você deseja descartar as alterações?",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonText: 'Descartar',
                 cancelButtonText: 'Cancelar',
                 customClass: {
                     confirmButton: 'btn btn-primary',
                     cancelButton: 'btn btn-light'
                 }
             }).then((result) => {
                 if (result.isConfirmed) {
                     formElement.reset();
                 }
             });
         });

         document.querySelector('[data-kt-roles-modal-action="close"]').addEventListener("click", function(
         event) {
             event.preventDefault();
             Swal.fire({
                 title: 'Você tem certeza?',
                 text: "Você deseja fechar este modal?",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonText: 'Sim, fechar',
                 cancelButtonText: 'Não, cancelar',
                 customClass: {
                     confirmButton: 'btn btn-primary',
                     cancelButton: 'btn btn-light'
                 }
             }).then((result) => {
                 if (result.isConfirmed) {
                     modalInstance.hide();
                 }
             });
         });

         function setupSelectAllCheckbox() {
             const selectAllCheckbox = document.getElementById('kt_roles_select_all');
             selectAllCheckbox.addEventListener('change', function() {
                 document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
                     checkbox.checked = this.checked;
                 });
             });
         }

         setupSelectAllCheckbox();
     });
 </script>
