"""pb backend application"""
from flask import Flask, jsonify

app = Flask(__name__)

@app.get('/')
def home():
    """description"""
    return jsonify("Hello Dev. Check the readme for api calls."), 200

if __name__ == "__main__":
    app.run(port=5000, debug=False)
