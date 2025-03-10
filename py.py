from flask import Flask, request, render_template

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/save', methods=['POST'])
def save():
    name = request.form['name']
    email = request.form['email']

    with open('user_data/data.txt', 'a', encoding='utf-8') as file:
        file.write(f"نام: {name}, ایمیل: {email}\n")

    return "اطلاعات شما با موفقیت ذخیره شد!"

if __name__ == '__main__':
    app.run(debug=True)
