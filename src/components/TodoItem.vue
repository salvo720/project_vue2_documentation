<template>
    <div id="todoitem">
        <!-- comment here for show only element  -->
            <hr>
            <h4>
                {{ show_element }}
                {{ todo }}
            </h4>
            <hr>
        <!--  -->
        <h5>
            {{ todo.id }} |
            {{ todo.text }}
        </h5>
    </div>
</template>
<script>
export default {
    name: 'todoitem',
    data(){
        return{
            show_element:'elementi completi passati al componente ',
        }
    },
    props: ['todo'],
    template: '<li>{{ todo.text }}</li>',
  
}
</script>