using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MenuSelectorRocket : MonoBehaviour
{
    public static bool GameStart;
    private Vector3 mousePosition;
    public float moveSpeed;

    private Vector2 targetPos;
    void Update()
    {
        if (MenuSelector.GameStart)
        {
            targetPos = new Vector2(10, -2);
            transform.position = Vector2.MoveTowards(transform.position, targetPos, 20 * Time.deltaTime);
        }
        else
        {
            mousePosition = Input.mousePosition;
            mousePosition = Camera.main.ScreenToWorldPoint(mousePosition);
            if (mousePosition.x > -9.2 && mousePosition.x < 9.2 && mousePosition.y > -5.2 && mousePosition.y < 5.2)
            {
                var pos = mousePosition;
                pos.y = -3;
                transform.position = Vector2.Lerp(transform.position, pos, moveSpeed);
            }
        }
    }
}

