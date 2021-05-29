import React, {Component} from 'react'
import Wrapper from '../Wrapper'
import axios from 'axios'
import {Book} from '../../classes/book'
import {Link} from 'react-router-dom'


class Books extends Component {

  state = {
    books : []
  }

  page = 1;
  last_page = 0;

  componentDidMount = async () => {
    const response = await axios.get(`books?page=${this.page}`)

   this.setState({
     books: response.data.data
   })

   this.last_page = response.data.meta.last_page;
    
  }


  previous = async () => {
      if(this.page === 1) return;

          this.page--;

          await this.componentDidMount();
      }


  next = async () => {

    if(this.page === this.last_page) return;

    this.page++;

    await this.componentDidMount();

  }

  render() {
    return (
      <Wrapper>

       <div className="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 className="h2">Dashboard</h1>
        <div className="btn-toolbar mb-2 mb-md-0">
            <div className="btn-group me-2">
                <button type="button" className="btn btn-sm btn-outline-secondary">Export</button>
             </div>
          
          
         </div>

       
    </div>

      <div className="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 ">
         <div className="btn-toolbar mb-2 mb-md-0">
            <Link to={'/users/create'} className= "btn btn-sm btn-outline-secondary">Add new book</Link>
         </div>
      </div>

        <div className="table-responsive">
        <table className="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Action</th>
               
            </tr>
            </thead>
            <tbody>

             {this.state.books.map(
               (book : Book) => {
                 return (
              <tr>
                <td>{book.id}</td>
                <td>{book.title}</td>
                <td>{book.author}</td>
                <td>  
                <div className="btn-group-mr2">
                  <a href="#" className="btn btn-sm btn-outline-secondary">Edit </a>
                  <a href="#" className="btn btn-sm btn-outline-secondary">Delete </a>

                </div>
                 </td>
                {/* <td>{book.description}</td>
                <td>{book.publisher}</td>
                <td>{book.genre}</td> */}
            </tr>
                 )
               }
             )}
           
            
            </tbody>
        </table>
    </div>

    <nav>
      <ul className ="pagination">

        <li className= "page-item">
          <a href="#" className="page-link" onClick={this.previous}>Previous </a>
        </li>

        <li className= "page-item">
          <a href="#" className="page-link" onClick={this.next}>Next</a>
        </li>

      
      </ul>


    </nav>






        </Wrapper>
      

    )
  }
}

export default Books;