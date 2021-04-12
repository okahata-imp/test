<html>
<body>
  <div id="chat">
    <textarea v-model="message"></textarea>
    <br>
    <button type="button" @click="send()">送信</button>

    <hr>

    <div v-for="m in messages">

      <!-- 登録された日時 -->
      <span v-text="m.created_at"></span>: &nbsp;

      <!-- メッセージ内容 -->
      <span v-test="m.body"></span>

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
            methods: {
              getMessages() {

                const url = '/ajax/chat';
                axios.get(url)
                  .then((response) => {

                    this.messages = response.data;

              });

            },
              send() {

                const url = '/ajax/chat';
                const params = { message: this.message };
                axios.post(url, params)
                    .then((response) => {

                        // 成功したらメッセージをクリア
                        this.message = '';

                    });

                  }
              }
              mounted(){

                  this.getMessages();

              }
          });
          
    </script>
</body>
</html>
