using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class Player : MonoBehaviour
{
    public int health = 3;
    public int coinsCount;

    private Vector3 mousePosition;
    public float moveSpeed = 1000f;


    private void Update()
    {

        if (health <= 0)
        {
            Vector2 targetPos = new Vector2(-15, -15);
            transform.position = Vector2.MoveTowards(transform.position, targetPos, 50 * Time.deltaTime);
            Invoke("GameOver", .5f);
        }
        else
        {

            mousePosition = Input.mousePosition;
            mousePosition = Camera.main.ScreenToWorldPoint(mousePosition);
            if (mousePosition.x > -9.2 && mousePosition.x < 9.2 && mousePosition.y > -5.2 && mousePosition.y < 5.2)
            {
                transform.position = Vector2.Lerp(transform.position, mousePosition, moveSpeed);
            }
        }
    }
    void GameOver()
    {
        SceneManager.LoadScene("StartMenu");
    }
}
