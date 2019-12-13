<html>
<body>
  <div id="chat">
    <textarea v-model="message"></textarea>
    <br>
    <button type="button" @click="send">送信</button>

    <hr>q

    <div v-for="m in messages">
      <span v-text="m.created_at"></span>：
      <span v-text="m.body"></span>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
  <script>

    new Vue({
      el: '#chat',
      data: {
        message: '',
        messages: []
      },
      mounted () {
        axios.get('ajax/chat')
          .then(res => {
            this.messages = res.data
            console.log(this.messages)
          })
      },
      methods: {
        send: function () {
          const params = {message: this.message}
          axios.post('ajax/chat', params)
            .then(res => {
              this.message = ''
            })
        }
      }
    })

  </script>
</body>
</html>