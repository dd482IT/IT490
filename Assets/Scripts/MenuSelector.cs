using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class MenuSelector : MonoBehaviour
{

    public static float xPos;
    public static bool GameStart = false;


    void OnMouseOver()
    {
        xPos = transform.position.x;

        if (Input.GetMouseButtonDown(0)) 
        {
            GameStart = true;

            Invoke("startGame", 1f);
        }
    }

    void startGame()
    {
        GameStart = false;

        SceneManager.LoadScene("EndlessCrypto");
    }


}
