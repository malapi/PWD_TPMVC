$('#eje4').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {

        nombre: {

            validators: {

                notEmpty: {

                    message: 'El nombre de usuario es requerido'

                }

            }

        },

        apellido: {

            validators: {

                notEmpty: {

                    message: 'el apellido es obligatorio'

                }

            }

        },

        edad: {

            validators: {
                notEmpty: {

                    message: 'la edad es obligatoria'

                },
                maxLength: {

                    message: 'ingrese un valor menor a 150'

                }

            }

        },

        inputTwitter: {

            validators: {


                regexp:{
                    message: 'Ingrese una cadena válida'
                },


            }

        }

    }

});
