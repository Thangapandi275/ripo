(function($) {
    showSwal = function(type) {
        'use strict';
        if (type === 'basic') {
            swal({
                text: 'Any fool can use a computer',
                button: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-primary"
                }
            })

        } else if (type === 'title-and-text') {
            swal({
                title: 'Read the alert!',
                text: 'Click OK to close this alert',
                button: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-primary"
                }
            })

        } else if (type === 'success-message') {
            swal({
                text: 'Thank you for your order, for further assitance we will get back to you soon',
                icon: 'success',
                button: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-primary"
                }
            })
            $('.swal-overlay, .swal-button').click(function(){
                $('.modal').modal('hide');
                $('.modal-backdrop').remove();
            }); 
            $('.swal-button--confirm').click(function(){
                location.href = "index.html";
            });

        }  else if (type === 'success-message-exp') {
            swal({
                title: 'Success',
                text: 'Your expenses details have been submitted successfully',
                icon: 'success',
                button: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-primary"
                }
            })
            $('.swal-overlay, .swal-button').click(function(){
                $('.modal').modal('hide');
                $('.modal-backdrop').remove();
            }); 
            $('.swal-button--confirm').click(function(){
                location.href = "expenses.html";
            });

        } else if (type === 'auto-close') {
            swal({
                title: 'Auto close alert!',
                text: 'I will close in 2 seconds.',
                timer: 2000,
                button: false
            }).then(
                function() {},
                // handling the promise rejection
                function(dismiss) {
                    if (dismiss === 'timer') {
                        console.log('I was closed by the timer')
                    }
                }
            )
        } else if (type === 'warning-message-and-cancel') {
            swal({
                title: 'Are you sure you want to submit the details?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3f51b5',
                cancelButtonColor: '#ff4081',
                confirmButtonText: 'Great ',
                buttons: {
                    confirm: {
                        text: "Yes",
                        value: true,
                        visible: true,
                        className: "btn btn-primary",
                        closeModal: true
                    },
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true,
                    }
                }
            })

        } else if (type === 'warning-message-and-cancelled') {
            swal({
                title: 'Are you sure you want to delete this Order?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3f51b5',
                cancelButtonColor: '#ff4081',
                confirmButtonText: 'Great ',
                buttons: {
                    confirm: {
                        text: "Yes",
                        value: true,
                        visible: true,
                        className: "btn btn-primary",
                        closeModal: true
                    },
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true,
                    }
                }
            })
            
            $('.swal-overlay, .swal-button').click(function(){
                $('.modal').modal('hide');
                $('.modal-backdrop').remove();
            }); 
            $('.swal-button--confirm').click(function(){
                location.href = "dashboard.html";
            });

        } else if (type === 'warning-message-and-confirm') {
            swal({
                title: "Please re-confirm, if you want to proceed this order?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3f51b5',
                cancelButtonColor: '#ff4081',
                confirmButtonText: 'Great ',
                buttons: {
                    confirm: {
                        text: "Yes",
                        value: true,
                        visible: true,
                        className: "btn btn-primary",
                        closeModal: true
                    },
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true,
                    },
                }
            })
            
            $('.swal-overlay, .swal-button').click(function(){
                $('.modal').modal('hide');
                $('.modal-backdrop').remove();
            }); 
            $('.swal-button--confirm').click(function(){
                location.href = "dashboard.html";
            });

        } else if (type === 'warning-message-and-scheduled') {
            swal({
                title: "Are you sure, you want to generate offer letter for this candidate?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3f51b5',
                cancelButtonColor: '#ff4081',
                confirmButtonText: 'Great ',
                buttons: {
                    confirm: {
                        text: "Yes",
                        value: true,
                        visible: true,
                        className: "btn btn-primary",
                        closeModal: true
                    },
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true,
                    },
                }
            })
            
            $('.swal-overlay, .swal-button').click(function(){
                $('.modal').modal('hide');
                $('.modal-backdrop').remove();
            }); 
            $('.swal-button--confirm').click(function(){
                location.href = "offer-letter-confirm.php";
            });

        } else if (type === 'warning-message-and-selected') {
            swal({
                title: "Are you sure, you want to convert this candidate as an Employee and proceed with the final recruitment Procedures?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3f51b5',
                cancelButtonColor: '#ff4081',
                confirmButtonText: 'Great ',
                buttons: {
                    confirm: {
                        text: "Yes",
                        value: true,
                        visible: true,
                        className: "btn btn-primary",
                        closeModal: true
                    },
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true,
                    },
                }
            })
            
            $('.swal-overlay, .swal-button').click(function(){
                $('.modal').modal('hide');
                $('.modal-backdrop').remove();
            }); 
            $('.swal-button--confirm').click(function(){
                location.href = "govtrelation.php";
            });

        } else if (type === 'warning-message-and-unfit') {
            swal({
                title: "Are you sure, the employee record will be moved to termination, due to unfit medical reason",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3f51b5',
                cancelButtonColor: '#ff4081',
                confirmButtonText: 'Great ',
                buttons: {
                    confirm: {
                        text: "Yes",
                        value: true,
                        visible: true,
                        className: "btn btn-primary",
                        closeModal: true
                    },
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true,
                    },
                }
            })
            
            $('.swal-overlay, .swal-button').click(function(){
                $('.modal').modal('hide');
                $('.modal-backdrop').remove();
            }); 
            $('.swal-button--confirm').click(function(){
                location.href = "terminationdetails.php";
            });

        } else if (type === 'custom-html') {
            swal({
                content: {
                    element: "input",
                    attributes: {
                        placeholder: "Type your password",
                        type: "password",
                        class: 'form-control'
                    },
                },
                button: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-primary"
                }
            })
        }
    }

})(jQuery);