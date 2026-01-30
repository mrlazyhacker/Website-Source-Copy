from flask import Flask, request, Response
import requests
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

@app.route('/get-source', methods=['POST'])
def get_source():
    data = request.json
    target_url = data.get('url')
    
    try:
        headers = {'User-Agent': 'Mozilla/5.0'}
        response = requests.get(target_url, headers=headers, timeout=10)
        
        return Response(
            response.text,
            mimetype="text/html",
            headers={"Content-disposition": "attachment; filename=source.html"}
        )
    except Exception as e:
        return {"error": str(e)}, 400

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
