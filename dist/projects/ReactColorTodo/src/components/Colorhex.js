import React from 'react'

export class Colorhex extends React.Component {
  render() {
    const colorhexStyle = {
        textAlign: "center",
        fontWeight: 'bold',
        fontFamily: 'sans-serif'
    }

    return (
      <div style={colorhexStyle}>
        <p>{this.props.color}</p>
      </div>
    )
  }
}
