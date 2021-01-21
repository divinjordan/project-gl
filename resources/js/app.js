const { default: axios } = require('axios');

require('./bootstrap');

require('alpinejs');

require('axios');


window.createQuestion  = function(firstCourse){
    return{
        responses:[{
            id: 0,
            text: "test",
            correct: false
        }],
        corrects:[],
        question:'',
        response:'',
        course: firstCourse,
        errors:[],
        responseEditedValue: '',
        addResponse(){
            this.responses.push({
                id: this.responses.length+1,
                text: this.response
            });
            this.response = '';
        },
        deleteResponse(event){
            const id = event.srcElement.dataset.id;
            if(confirm("Confirmer la suppression ?")){
                this.responses = this.responses.filter( e => e.id != id);
            }
        },
         create(){

            let canSend = true;

            if(this.question == ''){
                this.errors.push("L'intitulé de la question est requis");
                canSend = false;
            }

            if(!this.responses.length){
                this.errors.push("Aucune proposition de reponses n'a été ajouté");
                canSend = false;
            }

            if(canSend){
                const data = this.responses.map( element => {
                    return {
                        id: element.id,
                        value: element.text,
                        correct: this.corrects.includes(element.id+"")
                    }
                })

                axios.post(window.location.origin+"/questions",{
                    label: this.question,
                    responses: data,
                    course: this.course
                }).then( res => {
                    window.location.assign(window.location.origin+"/questions");
                });
            }           
        },
    }
}

window.editQuestion  = function(questionId){
    return{
        responses:[{
            id: 0,
            text: "test",
            correct: false
        }],
        corrects:[],
        question:'',
        response:'',
        course: '',
        errors:[],
        // Boolean to switch edit question behavior.
        init(){
            axios.get(window.location.origin+"/questions/"+questionId)
            .then( res => {
                this.responses = res.data.responses.map( (element,index) => {
                   return { 
                        id: index,
                        text: element.response_value,
                        correct: element.response_correct
                   }
                });
                this.question = res.data.question_label;
                this.corrects = this.responses.filter( element => element.correct ).map( e => e.id)
                this.course = res.data.course.id;
            })
        },
        addResponse(){
            this.responses.push({
                id: this.responses.length+1,
                text: this.response,
                editBool: false
            });
            this.response = '';
        },
        save(){

            let canSend = true;

            if(this.question == ''){
                this.errors.push("L'intitulé de la question est requis");
                canSend = false;
            }
            if(!this.responses.length){
                this.errors.push("Aucune proposition de reponses n'a été ajouté");
                canSend = false;
            }

            if(canSend){
                const data = this.responses.map( element => {
                    return {
                        id: element.id,
                        value: element.text,
                        correct: this.corrects.includes(element.id+"")
                    }
                })

                axios.put(window.location.origin+"/questions",{
                    label: this.question,
                    responses: data,
                    course: this.course
                }).then( res => {
                    winddow.location.assign(window.location.origin+"/questions");
                });
            }           
        },
    }
}

