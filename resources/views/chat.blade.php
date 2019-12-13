<html>
<body>
  <div id="chat">
    <textarea v-model="message"></textarea>
    <br>
    <button type="button" @click="send">送信</button>

    <hr>

    <div v-for="m in messages">
      <span v-text="m.created_at"></span>：
      <span v-text="m.body"></span>
    </div>
  </div>
  <script src="js/app.js"></script>
  <script>

    new Vue({
      el: '#chat',
      data: {
        message: '',
        messages: []
      },
      mounted () {
        this.getMessage()
        Echo.channel('chat')
          .listen('MessageCreated', e => {
            this.getMessage()
          })
      },
      methods: {
        getMessage () {
          axios.get('ajax/chat')
          .then(res => {
            this.messages = res.data
            console.log(this.messages)
          })
        },
        send () {
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