import React, { Component } from 'react';
import { Button } from 'zent';
import logo from './logo.svg';
import './App.css';
import 'zent/css/index.css';

class App extends Component {
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <p>
            Edit <code>src/App.js</code> and save to reload.1111
          </p>
          <a
            className="App-link"
            href="https://reactjs.org"
            target="_blank"
            rel="noopener noreferrer"
          >
            Learn React哈哈哈哈嗝
          </a>
          <Button>按钮11</Button>
        </header>
      </div>
    );
  }
}

export default App;
