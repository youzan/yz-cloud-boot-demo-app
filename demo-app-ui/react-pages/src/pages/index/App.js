import React, { Component } from 'react';
import { Icon } from 'zent';
import './App.css';

class App extends Component {
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <img src="https://img.yzcdn.cn/youzanyun/favicon.ico" alt="logo" />
          <p>
            有赞电商云
          </p>
          
          <a
            className="App-link"
            href="https://www.youzanyun.com/"
            target="_blank"
            rel="noopener noreferrer"
          >
            <Icon type="youzan" />有你，有赞!娃哈哈
          </a>
        </header>
      </div>
    );
  }
}

export default App;
