const { default: axios } = require('axios');

const { v4 : uuidv4} = require('uuid');

require('./bootstrap');

require('alpinejs');

require('axios');


const questionComponentData = {
    responses:[],
    corrects:[],
    questionTitle:'',
    response:'',
    course: '',
    courses:[],
    errors:[],
}

const questionComponent = {
    ...questionComponentData,
    init(){
        axios.get( `${window.location.origin}/userCourses`)
        .then( res => {
            console.log(res.data);
            this.courses = res.data;
            this.course = this.courses[0].id;
        }).catch( error => console.log(err))
    },
    addResponse(){
        this.errors = [];
        if(this.response == ''){
            this.errors.push("La reponse est requise");
        }else{
            this.responses.push({
                id: uuidv4(),
                text: this.response
            });
        }
        this.response = '';
    },
    deleteResponse(event){
        const id = event.srcElement.dataset.id;
        console.log(id);
        if(confirm("Confirmer la suppression ?")){
            console.log(id);
            this.responses = this.responses.filter( e => e.id != id);
        }
    },
    validateForm(){
        let valid = true;
        if(this.questionTitle == ''){
            this.errors.push("L'intitulé de la question est requis");
            valid = false;
        }
        if(!this.responses.length){
            this.errors.push("Aucune proposition de reponses n'a été ajouté");
            valid = false;
        }
        return valid;
    },
    formatResponses(){
        return this.responses.map( element => {
            return {
                id: element.id,
                value: element.text,
                correct: this.corrects.includes(element.id+"")
            }
        })
    }
}

window.createQuestion  = function(){
    return{
        ...questionComponent,
        responses:[{
            id: 0,
            text: "test"
        }], 
        store(){
            if(this.validateForm()){
                axios.post(window.location.origin+"/questions",{
                    title: this.questionTitle,
                    responses: this.formatResponses(),
                    course: this.course
                }).then( res => {
                    window.location.assign(window.location.origin+"/questions");
                });
            }           
        }
    }
}

window.editQuestion = function (questionId) {
    return {
        ...questionComponent,
        question: '',
        oldResponses:[],
        async init(){

            let result = await axios.get( `${window.location.origin}/userCourses`)

            this.courses = result.data;

            result = await axios.get(`${window.location.origin}/questions/${questionId}`);

            this.question = result.data;

            this.questionTitle = this.question.question_label;

            this.course = this.question.course_id;

            this.responses = this.question.responses.map( e => {
                return {
                    id: e.id,
                    text: e.response_value
                }
            })

            this.oldResponses = this.question.responses.map( e => {
                return {
                    id: e.id,
                    value: e.response_value
                }
            })

            this.corrects = this.question.responses.filter( e => e.response_correct).map( e => e.id);
            console.log(this.corrects);
        },
        store(){
            if(this.validateForm()){
                axios.put(window.location.origin+"/questions/"+questionId,{
                    title: this.questionTitle,
                    responses: this.formatResponses(),
                    course: this.course,
                    oldResponses: this.oldResponses
                }).then( res => {
                    window.location.reload();
                });
            }  
        }
    }
}

