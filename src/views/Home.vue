<template>
<div id="app">
  <h4>
    <span v-bind:title="message">
      Passa il mouse su di me per alcuni secondi
      per vedere il mio titolo legato dinamicamente!
    </span>
    <hr>
    <br>
    <span v-if="seen">
      Ora mi vedi
    </span>
    <hr>
    <br>
    <ul>
      <li v-for="todo in todos" v-bind:key="todo">
        {{ todo.text }}
      </li>
    </ul>
  <br>
  <hr>
    <button v-on:click="reverseMessage">{{ message }}</button>
    <hr>
    <h2>Valore da invertire</h2>
    {{ reverse_message }}
    <hr>
  <hr>
  <br>
   <input v-model="reverse_message">
  <hr>
  <h2>valore reverse message</h2>
  {{ reverse_message }}
  <hr>
  <TodoItem v-for="item in groceryList" v-bind:todo="item" v-bind:key="item.id"></TodoItem>
  <!-- l'elemento passao al v-bind (in questo caso todo ) indica il nome della variabile a cui passeremo i dati .
   il v-bind-key: , viene usato per scegliere la chiave del for  -->
  </h4>
  <hr>
  
  <hr>
</div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import TodoItem from '@/components/TodoItem.vue'

export default {
name: 'app',
  data() {
    return {
      message:'You loaded this page on ' + new Date().toLocaleString() ,
      reverse_message : 'Reverse message' ,
      seen: true ,
      todos: [
      { text: 'impara JavaScript' },
      { text: 'impara Vue' },
      { text: 'Build something awesome' }
      ],
      groceryList: [
        { id: 0, text: 'Vegetables' },
        { id: 1, text: 'Cheese' },
        { id: 2, text: 'Whatever else humans are supposed to eat' }
      ]
    }
  },
  methods: {
    reverseMessage: function () {
      this.reverse_message = this.reverse_message.split('').reverse().join('')
    }
  },
  components: {
    TodoItem // Register a new component
  },
}
// TODO : add to git ignore package.json  , different install from windows and mac , 
//  or reinstall vue project every times 
</script>
